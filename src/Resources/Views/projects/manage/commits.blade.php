@extends('luba::projects.manage._master')
@section('detail.project_management')
    <?php
        $commits = [];
    ?>
    <luba-breadcrumb
        title="luba::navigation.project_commits"
        :route="route('luba::projects.manage.commits', $project->encodedId)"/>
    <div class="row">
        @if ($project->commits->count() > 0)
            <div class="col-md-auto">
                <ul class="list-group mb-4">
                    @foreach ($project->commits as $commit)
                        <li class="list-group-item" data-commit-selector="commit-{{ $commit->hash }}">
                            <span>{{ $commit->date }}</span>
                            <strong class="ml-2">{{ $commit->shortHash }}</strong>
                            @if ($commit->preview)
                                <i class="fa ml-2 fa-images"></i>
                            @endif
                        </li>
                        <?php
                            $commits[] = [
                                'id' => $commit->encodedId,
                                'hash' => $commit->hash,
                                'author' => $commit->author,
                                'date' => $commit->date,
                                'description' => $commit->description,
                                'comments' => $commit->comments()->get(['body']),
                                'previews' => $commit->previews,
                                'links' => [
                                    'addPreview' => '#',
                                    'addComments' => '#'
                                ]
                            ];
                        ?>
                    @endforeach
                </ul>
            </div>
            <div class="col-md">
                <div class="card mb-4" id="commit-details">
                    <?php $commit = $project->commits[0]; ?>
                    <div class="card-header">
                        <strong>@lang('luba::ui.commit_hash')</strong>
                        <span id="commit-hash">{{ $commit->hash }}</span>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-auto text-center" id="commit-previews">
                                <img
                                    src="https://dummyimage.com/900x200/ddd/444"
                                    alt="{{ $commit->hash }}"
                                    class="img-fluid">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <strong>@lang('luba::ui.commit_author')</strong>
                                <p id="commit-author">{{ $commit->author }}</p>
                            </div>
                            <div class="col-sm-6">
                                <strong>@lang('luba::ui.commit_date')</strong>
                                <p id="commit-date">{{ $commit->date }}</p>
                            </div>
                            <div class="col-sm-12">
                                <strong>@lang('luba::ui.commit_description')</strong>
                                <p id="commit-description">{{ $commit->description }}</p>
                            </div>
                            <div class="col-sm-12">
                                <strong>@lang('luba::ui.commit_comments')</strong>
                                <div id="commit-comments">
                                    @if ($commit->comments && $commit->comments->count() > 0)
                                        @foreach ($commit->comments as $comment)
                                            <p>{{ $comment->body }}</p>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <a href="#" class="btn btn-default" id="commit-add-preview" data-toggle="collapse" data-target="#add-preview">
                            <i class="fa mr-2 fa-images"></i>
                            @lang('luba::ui.add_preview')
                        </a>
                        <a href="#" class="btn btn-primary" id="commit-add-comments" data-toggle="collapse" data-target="#add-comment">
                            <i class="fa mr-2 fa-comment-alt"></i>
                            @lang('luba::ui.add_comments')
                        </a>
                    </div>
                </div>
                <form
                    method="POST"
                    id="add-comment"
                    class="card {{ $errors->has('body') ? 'show' : 'collapse' }}"
                    action="{{ route('luba::projects.manage.commits.comments.add', $project->encodedId) }}">
                    <div class="card-header">
                        @lang('luba::ui.add_comment')
                        <a href="#" class="float-right" data-toggle="collapse" data-target="#add-comment">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                    <div class="card-body">
                        @csrf
                        <input type="hidden" name="id" id="commit-comment">
                        <luba-input-text name="body" label="comment_body" required />
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">@lang('luba::ui.submit_comment')</button>
                    </div>
                </form>

                <form
                    method="POST"
                    id="add-preview"
                    enctype="multipart/form-data"
                    class="card {{ $errors->has('preview') ? 'show' : 'collapse' }}"
                    action="{{ route('luba::projects.manage.commits.previews.add', $project->encodedId) }}">
                    <div class="card-header">
                        @lang('luba::ui.add_preview')
                        <a href="#" class="float-right" data-toggle="collapse" data-target="#add-preview">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                    <div class="card-body">
                        @csrf
                        <input type="hidden" name="id" id="commit-preview-hidden">
                        <luba-input-image name="preview" label="commit_preview" required />
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">@lang('luba::ui.submit_preview')</button>
                    </div>
                </form>
            </div>
        @endif
    </div>
@stop

@if ($project->commits->count() > 0)
    @push('luba::scripts')
        <script>
            let commitDetailsContainer = document.getElementById('commit-details')
            if (commitDetailsContainer) {
                window._currentCommit = null
                let hash = document.getElementById('commit-hash')
                let previews = document.getElementById('commit-previews')
                let author = document.getElementById('commit-author')
                let date = document.getElementById('commit-date')
                let description = document.getElementById('commit-description')
                let comments = document.getElementById('commit-comments')
                let addPreview = document.getElementById('commit-add-preview')
                let addComments = document.getElementById('commit-add-comments')
                const COMMITS = {!! json_encode($commits) !!}
                const commitSelectors = document.querySelectorAll('[data-commit-selector]')

                commitSelectors.forEach(selector => {
                    selector.addEventListener('click', ev => {
                        selectCommit(selector.getAttribute('data-commit-selector'))
                    })
                })
                const selectCommitSetActive = commitAttribute => {
                    commitSelectors.forEach(selector => {
                        let hash = selector.getAttribute('data-commit-selector')
                        if (hash === commitAttribute) {
                            selector.classList.add('active')
                        } else {
                            selector.classList.remove('active')
                        }
                    })
                }
                const selectCommit = (commitAttribute) => {
                    let commit
                    let _hash = commitAttribute.replace('commit-', '')
                    selectCommitSetActive(commitAttribute)
                    COMMITS.forEach(c => {
                        if (c.hash === _hash) {
                            commit = c
                            window._currentCommit = c
                        }
                    })
                    hash.innerHTML = commit.hash ? commit.hash : ''
                    if (commit.previews) {
                        previews.innerHTML = ''
                        commit.previews.forEach(preview => {
                            let img = document.createElement('img')
                            img.classList.add('img-fluid')
                            img.setAttribute('src', preview.path)
                            previews.append(img)
                        })
                    }
                    author.innerHTML = commit.author ? commit.author : ''
                    date.innerHTML = commit.date ? commit.date : ''
                    description.innerHTML = commit.description ? commit.description : ''
                    if (commit.comments) {
                        comments.innerHTML = ''
                        commit.comments.forEach(comment => {
                            let p = document.createElement('p')
                            p.innerHTML = comment.body
                            comments.append(p)
                        })
                    }
                    // comments.innerHTML = commit.comments ? commit.comments : ''
                    addPreview.setAttribute('href', commit.links.addPreview ? commit.links.addPreview : '#')
                    addComments.setAttribute('href', commit.links.addComments ? commit.links.addComments : '#')
                }

                @if (session('selectedCommit'))
                    selectCommit('commit-{{ session('selectedCommit') }}')
                @else
                    selectCommit('commit-{{ $project->commits->first()->hash }}')
                @endif

                let addCommentButton = document.getElementById('commit-add-comments')
                let hiddenCommitId = document.getElementById('commit-comment')
                addCommentButton.addEventListener('click', ev => {
                    if (window._currentCommit) {
                        hiddenCommitId.value = window._currentCommit.id
                    }
                })

                let addPreviewButton = document.getElementById('commit-add-preview')
                let hiddenCommitPreviewId = document.getElementById('commit-preview-hidden')
                addPreviewButton.addEventListener('click', ev => {
                    if (window._currentCommit) {
                        hiddenCommitPreviewId.value = window._currentCommit.id
                    }
                })
            }
        </script>
    @endpush
@endif
