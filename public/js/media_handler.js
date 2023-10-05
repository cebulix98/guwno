function RecordMediaTime(class_id, course_id, current_time, type) {
    data = {
        'class_id': class_id,
        'course_id': course_id,
        'current_time': current_time
    }

    console.log(data);

    if (type == 'VIDEO') {
        AjaxCall("/courses/files/video/record", 'POST', 'JSON', data, function (result) {
            console.log(result);
        });
    }

    if (type == 'AUDIO') {
        AjaxCall("/courses/files/audio/record", 'POST', 'JSON', data, function (result) {
            console.log(result);
        });
    }
}

function RecordMedia(form_id, current_time, type) {
    var form = document.getElementById(form_id);
    if (current_time) RecordMediaTime(form.class_id.value, form.course_id.value, current_time, type);
}

function LoadMedia(player_id, form_id) {
    var player = document.getElementById(player_id);
    var form = document.getElementById(form_id);

    if (player) { player.currentTime = form.current_time.value; }

}

function GetCurrentTime(player_id) {
    var player = document.getElementById(player_id);
    var time = false;
    if (player) time = player.currentTime;

    return time;
}

function IsPlaying(player_id) {
    var player = document.getElementById(player_id);
    if (player) {
        try {
            var video = player.getElementsByTagName('video');
            var audio = player.getElementsByTagName('video');
            var is_playing = 0;
            if (video) is_playing = video[0].getAttribute('data-status');
            if (audio) is_playing = audio[0].getAttribute('data-status');
            if (is_playing == 1) return true;
        } catch ($e) { }
    }

    return false;
}

function PrepareMedia() {
    const video = document.querySelector('video');
    const audio = document.querySelector('audio');
    if (video) {
        video.addEventListener('loadedmetadata', (event) => { });

        video.onloadedmetadata = (event) => {
            LoadMedia('player_1', 'form_courses_player_video');
            LoadMedia('player_2', 'form_courses_player_video');
            console.log('video loaded');
        };
    }
    if (audio) {
        audio.addEventListener('loadedmetadata', (event) => { });

        audio.onloadedmetadata = (event) => {
            LoadMedia('player_3', 'form_courses_player_audio');
            console.log('audio loaded');
        };
    }
}

function OnPause(player) {
    console.log(player.currentTime);
    player.setAttribute('data-status', 0);

    if (player.nodeName == 'VIDEO') {
        RecordMedia('form_courses_player_video', player.currentTime, player.nodeName);
    }

    if (player.nodeName == 'AUDIO') {
        RecordMedia('form_courses_player_audio', player.currentTime, player.nodeName);
    }
}

function OnPlay(player) {
    console.log(player.currentTime);
    player.setAttribute('data-status', 1);
}

function OnPlaying() {
    if (IsPlaying('player_1')) {
        var time = GetCurrentTime('player_1');
        console.log(time);
        RecordMedia('form_courses_player_video', time, 'VIDEO');
    }

    if (IsPlaying('player_2')) {
        var time = GetCurrentTime('player_2');
        console.log(time);
        RecordMedia('form_courses_player_video', time, 'VIDEO');
    }

    if (IsPlaying('player_3')) {
        var time = GetCurrentTime('player_3');
        console.log(time);
        RecordMedia('form_courses_player_audio', time, 'AUDIO');
    }
}