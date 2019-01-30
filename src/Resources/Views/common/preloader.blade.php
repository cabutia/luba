<?php
    $id = 'preloader';
    $anim = '150';
?>

@if (config('luba.ui.preloader'))
    <div
        class="preloader"
        id="{{ $id }}"
        style="
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000000;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            width: 100vw;
            height: 100vh;
            background: rgba(230,230,230,0.9);
            opacity: 1;
            visibility: visible;
            transition: opacity 0.{{ $anim }}s ease,
                        visibility 0.{{ $anim }}s ease;
        ">
        <h1
            style="
                font-weight: bold;
                font-size: 20pt;
                text-transform: uppercase;
                color: #444;
            ">
            @lang('luba::ui.loading')
        </h1>
    </div>

    @push('luba::scripts')
        <script type="text/javascript">
            let hideElem = el => {
                el.style.visibility = 'hidden'
                el.style.opacity = '0'
            }

            let showElem = el => {
                el.style.visibility = 'visible'
                el.style.opacity = '1'
            }

            let handleBeforeUnload = ev => {
                let e = ev || window.event
                let preloader = document.getElementById('{{ $id }}')
                showElem(preloader)
                setTimeout(() => {
                    hideElem(preloader)
                }, {{ $anim }})
            }

            let handleOnLoad = ev => {
                let e = ev || window.event
                let preloader = document.getElementById('{{ $id }}')
                setTimeout(() => {
                    hideElem(preloader)
                }, {{ $anim }})
            }

            let showPreloader = (ev = null) => {
                let preloader = document.getElementById('{{ $id }}')
            }
        </script>
    @endpush
@endif
