
<div class="chat-content">
    <div class="conversation">
        <div class="conversation-wrapper">
            <div class="conversation-header justify-content-between">
                <div class="media align-items-center">
                    <a href="javascript:void(0);" class="chat-close m-r-20 d-md-none d-block text-dark font-size-18 m-t-5" >
                        <i class="anticon anticon-left-circle"></i>
                    </a>
                    <div class="avatar avatar-image">
                        <img src="assets/images/avatars/thumb-1.jpg" alt="">
                    </div>
                    <div class="p-l-15">
                        <h6 class="m-b-0">Erin Gonzales</h6>
                        <p class="m-b-0 text-muted font-size-13 m-b-0">
                            <span class="badge badge-success badge-dot m-r-5"></span>
                            <span>Online</span>
                        </p>
                    </div>
                </div>
                <div class="dropdown dropdown-animated scale-left">
                    <a class="text-dark font-size-20" href="javascript:void(0);" data-toggle="dropdown">
                        <i class="anticon anticon-setting"></i>
                    </a>
                    <div class="dropdown-menu">
                        <button class="dropdown-item" type="button">Action</button>
                        <button class="dropdown-item" type="button">Another action</button>
                        <button class="dropdown-item" type="button">Something else here</button>
                    </div>
                </div>
            </div>
            <div class="conversation-body">
                <div class="msg justify-content-center">
                    <div class="font-weight-semibold font-size-12 text-uppercase"> {{$fecha}} </div>
                </div>
                @livewire('chat-list')
                {{-- <div id="notification" class="position-absolute alert alert-success collapse" role="alert">
                    <div class="d-flex align-items-center justify-content-start">
                        <span class="alert-icon">
                            <i class="anticon anticon-check"></i>
                        </span>
                        <span>Mensaje enviado</span>
                    </div>
                </div> --}}
            </div>
            <div class="conversation-footer">
                <input class="chat-input" type="text" placeholder="Enviar un mensaje..." wire:model="message" wire:keydown.enter="sendMessage" autofocus>
                <ul class="list-inline d-flex align-items-center m-b-0">
                    <li class="list-inline-item m-r-15">
                        <a class="text-gray font-size-20" href="javascript:void(0);" data-toggle="tooltip" title="Emoji">
                            <i class="anticon anticon-smile"></i>
                        </a>
                    </li>
                    <li class="list-inline-item m-r-15">
                        <a class="text-gray font-size-20" href="javascript:void(0);" data-toggle="tooltip" title="Attachment">
                            <i class="anticon anticon-paper-clip"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <button class="d-none d-md-block btn btn-primary" wire:click="sendMessage">
                            <span class="m-r-10">Enviar</span>
                            <i class="far fa-paper-plane"></i>
                        </button>
                        <a href="javascript:void(0);" class="text-gray font-size-20 d-md-none d-block">
                            <i class="far fa-paper-plane"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@section('js')
    <script>
        window.livewire.on('sendMessage', function(){
            $('#notification').fadeIn('fast');
            setTimeout(() => {
                $('#notification').fadeOut('fast');
            }, 3000);
        })
    </script>
@endsection
