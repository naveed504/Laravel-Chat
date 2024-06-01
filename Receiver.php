@extends('user.layout')
@section('title')
<style>
body,
html {
    height: 100%;
    margin: 0;
    background: #7F7FD5;
    background: -webkit-linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);
    background: linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);
}

.chat {
    margin-top: auto;
    margin-bottom: auto;
}

.card {
    height: 500px;
    border-radius: 15px !important;
    background-color: rgba(0, 0, 0, 0.4) !important;
}

.contacts_body {
    padding: 0.75rem 0 !important;
    overflow-y: auto;
    white-space: nowrap;
}

.msg_card_body {
    overflow-y: auto;
}

.card-header {
    border-radius: 15px 15px 0 0 !important;
    border-bottom: 0 !important;
}

.card-footer {
    border-radius: 0 0 15px 15px !important;
    border-top: 0 !important;
}

.container {
    align-content: center;
}

.search {
    border-radius: 15px 0 0 15px !important;
    background-color: rgba(0, 0, 0, 0.3) !important;
    border: 0 !important;
    color: white !important;
}

.search:focus {
    box-shadow: none !important;
    outline: 0px !important;
}

.type_msg {
    background-color: rgba(0, 0, 0, 0.3) !important;
    border: 0 !important;
    color: white !important;
    height: 60px !important;
    overflow-y: auto;
}

.type_msg:focus {
    box-shadow: none !important;
    outline: 0px !important;
}

.attach_btn {
    border-radius: 15px 0 0 15px !important;
    background-color: rgba(0, 0, 0, 0.3) !important;
    border: 0 !important;
    color: white !important;
    cursor: pointer;
}

.send_btn {
    border-radius: 0 15px 15px 0 !important;
    background-color: rgba(0, 0, 0, 0.3) !important;
    border: 0 !important;
    color: white !important;
    cursor: pointer;
}

.search_btn {
    border-radius: 0 15px 15px 0 !important;
    background-color: rgba(0, 0, 0, 0.3) !important;
    border: 0 !important;
    color: white !important;
    cursor: pointer;
}

.contacts {
    list-style: none;
    padding: 0;
}

.contacts li {
    width: 100% !important;
    padding: 5px 10px;
    margin-bottom: 15px !important;
}

.active {
    background-color: rgba(0, 0, 0, 0.3);
}

.user_img {
    height: 70px;
    width: 70px;
    border: 1.5px solid #f5f6fa;

}

.user_img_msg {
    height: 40px;
    width: 40px;
    border: 1.5px solid #f5f6fa;

}

.img_cont {
    position: relative;
    height: 70px;
    width: 70px;
}

.img_cont_msg {
    height: 40px;
    width: 40px;
}

.online_icon {
    position: absolute;
    height: 15px;
    width: 15px;
    background-color: #4cd137;
    border-radius: 50%;
    bottom: 0.2em;
    right: 0.4em;
    border: 1.5px solid white;
}

.offline {
    background-color: #c23616 !important;
}

.user_info {
    margin-top: auto;
    margin-bottom: auto;
    margin-left: 15px;
}

.user_info span {
    font-size: 20px;
    color: white;
}

.user_info p {
    font-size: 10px;
    color: rgba(255, 255, 255, 0.6);
}

.video_cam {
    margin-left: 50px;
    margin-top: 5px;
}

.video_cam span {
    color: white;
    font-size: 20px;
    cursor: pointer;
    margin-right: 20px;
}

.msg_cotainer {
    margin-top: auto;
    margin-bottom: auto;
    margin-left: 10px;
    border-radius: 25px;
    background-color: #82ccdd;
    padding: 10px;
    position: relative;
}

.msg_cotainer_send {
    margin-top: auto;
    margin-bottom: auto;
    margin-right: 10px;
    border-radius: 25px;
    background-color: #78e08f;
    padding: 10px;
    position: relative;
}

.msg_time {
    position: absolute;
    left: 0;
    bottom: -15px;
    color: rgba(255, 255, 255, 0.5);
    font-size: 10px;
}

.msg_time_send {
    position: absolute;
    right: 0;
    bottom: -15px;
    color: rgba(255, 255, 255, 0.5);
    font-size: 10px;
}

.msg_head {
    position: relative;
}

#action_menu_btn {
    position: absolute;
    right: 10px;
    top: 10px;
    color: white;
    cursor: pointer;
    font-size: 20px;
}

.action_menu {
    z-index: 1;
    position: absolute;
    padding: 15px 0;
    background-color: rgba(0, 0, 0, 0.5);
    color: white;
    border-radius: 15px;
    top: 30px;
    right: 15px;
    display: none;
}

.action_menu ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.action_menu ul li {
    width: 100%;
    padding: 10px 15px;
    margin-bottom: 5px;
}

.action_menu ul li i {
    padding-right: 10px;

}

.action_menu ul li:hover {
    cursor: pointer;
    background-color: rgba(0, 0, 0, 0.2);
}

@media(max-width: 576px) {
    .contacts_card {
        margin-bottom: 15px !important;
    }
}
</style>

<title>{{__('Chat With Tenant')}}</title>
@endsection
@section('user-dashboard')
<div class="row">
    <div class="col-xl-9 ms-auto">
        <div class="wsus__dashboard_main_content">

            <h4 class="heading">{{__('Chat With Tenant')}}</h4>

            <div class="h-100">
                <div class="row  h-100">
                    <div class="col-lg-4">
                        <div class=" card mb-sm-3 mb-md-0 contacts_card">

                            <div class="card-body contacts_body">
                                <ui class="contacts">
                                    @foreach($tenants as $key => $tenant)


                                    <li>
                                        <div class="d-flex bd-highlight">

                                            <div class="user_info">
                                                <span> <a href="{{route('user.open.chat', $tenant->id)}}"
                                                        style="color: white">{{$tenant->name}} </a> <span
                                                        style="font-size: 8px">
                                                        (
                                                        {{\App\Models\UserChat::where('tenant_id',$tenant->id)->where('landlord_id', auth()->user()->id)->count('message')}}
                                                        )
                                                    </span></span>
                                            </div>

                                        </div>
                                    </li>
                                    @endforeach
                                </ui>
                            </div>
                            <div class="card-footer"></div>
                        </div>
                    </div>
                    <input type="hidden" id="getuserid" value="{{$user->id}}">
                    <div class="col-lg-7">
                        <div class="card">

                            <div class="card-header msg_head">
                                <div class="d-flex bd-highlight">
                                    <div class="img_cont">
                                        <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg"
                                            class="rounded-circle user_img">
                                        <span class="online_icon"></span>
                                    </div>
                                    <div class="user_info">
                                        <span>Chat with {{$user->name}}</span>

                                    </div>

                                </div>
                                <span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>
                                <div class="action_menu">
                                    <ul>
                                        <li><i class="fas fa-user-circle"></i> View profile</li>
                                        <li><i class="fas fa-users"></i> Add to close friends</li>
                                        <li><i class="fas fa-plus"></i> Add to group</li>
                                        <li><i class="fas fa-ban"></i> Block</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body msg_card_body">

                                <div id="landlordmsg"></div>
                            </div>
                            <div class="card-footer">
                                <div class="input-group">

                                    <textarea name="" id="sendwritetext" class="form-control type_msg"
                                        placeholder="Type your message..."></textarea>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>

<script>
$(document).ready(function() {


    var tenantid = $("#getuserid").val();
    getlatestchat(tenantid)
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // var propertyslug = $("#getslug").val();
    $("#sendwritetext").on('keydown', function(e) {
        if (e.keyCode == 13) {
            console.log()
            var tenantid = $("#getuserid").val();
            var usermesg = $(this).val();
            $.ajax({
                type: 'POST',
                url: "{{ route('user.tenantajaxRequest.post') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    msg: usermesg,
                    tenantid: tenantid
                },
                success: function(data) {
                    $("#sendwritetext").val('');

                    getlatestchat(tenantid);
                }
            });
        }

    });

    function getlatestchat(tenantid) {
        $.ajax({
            type: 'POST',
            url: "{{ route('user.get.latest.chat.of.tenant') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                tenantid: tenantid
            },
            success: function(data) {
                if (data) {
                    $.each(data, function(index, chatItem) {

                        var landlordchatBox;
                        if (chatItem.send_to == 'landlord') {
                            landlordchatBox = $(
                                '<div class="d-flex justify-content-start mb-4">' +
                                '<div class="msg_cotainer">' +
                                chatItem.message +
                                '</div>' +
                                '</div>');
                            if (chatItem.file_name) {
                                landlordchatBox = $(
                                    '<div class="d-flex justify-content-start mb-4">' +
                                    '<div class="msg_cotainer">' +
                                    '<p>' +
                                    '<a href="#" id="your_id_here"><input type="hidden" id="download_file"  value=' +
                                    chatItem.id + ' />' + 'Download Your File' +
                                    '</a>' + '</p>' +
                                    '</div>' +
                                    '</div>');
                            }
                        } else {
                            landlordchatBox = $(
                                '<div class="d-flex justify-content-end mb-4">' +
                                '<div class="msg_cotainer_send">' +
                                chatItem.message +
                                '</div>' +
                                '</div>');


                        }
                        $("#landlordmsg").append(landlordchatBox);

                    })

                } else {

                }


            }
        });

    }
    const interval = setInterval(function() {
        var tenantid = $("#getuserid").val();
        $("#landlordmsg").load(location.href + " #landlordmsg>*", "");
        // $('#landlordmsg div').empty('');
        getlatestchat(tenantid)
    }, 30000);
});
</script>
@endsection