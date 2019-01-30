<?php
    // Main alert collection
    $_message_collection = [];
    $_message_collection['errors'] = new \Illuminate\Support\Collection();
    $_message_collection['messages'] = new \Illuminate\Support\Collection();
    $_message_collection['warnings'] = new \Illuminate\Support\Collection();
    $_message_collection['successes'] = new \Illuminate\Support\Collection();

    // Error collecting
    $_errors = $errors->all();
    foreach ($_errors as $error) {
        $_message_collection['errors']->push($error);
    }

    // Warnings collecting
    $_session_warnings = session('warnings') ? (is_array(session('warnings')) ? session('warnings') : [session('warnings')]) : [];
    $_controller_warnings = isset($warnings) ? (is_array($warnings) ? $warnings : [$warnings]) : [];
    foreach ($_session_warnings as $sw) $_message_collection['warnings']->push($sw);
    foreach ($_controller_warnings as $cw) $_message_collection['warnings']->push($cw);

    // Successes collecting
    $_session_successes = session('successes') ? (is_array(session('successes')) ? session('successes') : [session('successes')]) : [];
    $_controller_successes = isset($successes) ? (is_array($successes) ? $successes : [$successes]) : [];
    foreach ($_session_successes as $sw) $_message_collection['successes']->push($sw);
    foreach ($_controller_successes as $cw) $_message_collection['successes']->push($cw);

    // Messages collecting
    $_session_messages = session('messages') ? (is_array(session('messages')) ? session('messages') : [session('messages')]) : [];
    $_controller_messages = isset($messages) ? (is_array($messages) ? $messages : [$messages]) : [];
    foreach ($_session_messages as $sw) $_message_collection['messages']->push($sw);
    foreach ($_controller_messages as $cw) $_message_collection['messages']->push($cw);
    $_types = [
        'errors' => 'alert-danger',
        'messages' => 'alert-info',
        'warnings' => 'alert-warning',
        'successes' => 'alert-success',
    ];
?>

@foreach ($_message_collection as $type => $messages)
    @foreach ($messages as $message)
        <div class="alert {{ $_types[$type] }}">
            {{ $message }}
        </div>
    @endforeach
@endforeach
