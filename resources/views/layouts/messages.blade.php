@if(Session::has('errors'))
    <div class="toastify off  toastify-right toastify-top transition-all">
        <div id="errors-notification-content" class="toastify-content flex">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 icon-name="check-circle" class="lucide lucide-check-circle text-danger" data-lucide="check-circle">
                <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                <polyline points="22 4 12 14.01 9 11.01"></polyline>
            </svg>
            <div class="ml-4 mr-4">
                <div class="font-medium">{{ __('translates.errors') }}</div>
                <div class="text-slate-500 mt-1">
                    <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                    </ul>

                </div>
            </div>
        </div>
        <span class="toast-close">✖</span>
    </div>
@endif

@if(Session::has("error"))
    <div class="toastify off  toastify-right toastify-top transition-all">
        <div id="error-notification-content" class="toastify-content flex">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 icon-name="check-circle" class="lucide lucide-check-circle text-danger" data-lucide="check-circle">
                <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                <polyline points="22 4 12 14.01 9 11.01"></polyline>
            </svg>
            <div class="ml-4 mr-4">
                <div class="font-medium">{{ __('translates.error') }}</div>
                <div class="text-slate-500 mt-1">{{ Session::get("error") }}</div>
            </div>
        </div>
        <span class="toast-close">✖</span></div>

@endif


@if(Session::has('success'))
    <div class="toastify off toastify-right toastify-top transition-all">
        <div id="success-notification-content" class="toastify-content flex">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 icon-name="check-circle" class="lucide lucide-check-circle text-success" data-lucide="check-circle">
                <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                <polyline points="22 4 12 14.01 9 11.01"></polyline>
            </svg>
            <div class="ml-4 mr-4">
                <div class="font-medium">{{ __('translates.success') }}</div>
                <div class="text-slate-500 mt-1">{{Session::get('success')}}</div>
            </div>
        </div>
        <span class="toast-close">✖</span></div>
@endif

@if(session('permission'))
    <div class="toastify off  toastify-right toastify-top transition-all">
        <div id="permission-notification-content" class="toastify-content flex">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 icon-name="check-circle" class="lucide lucide-check-circle text-danger" data-lucide="check-circle">
                <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                <polyline points="22 4 12 14.01 9 11.01"></polyline>
            </svg>
            <div class="ml-4 mr-4">
                <div class="font-medium">{{ __('translates.attention') }}</div>
                <div class="text-slate-500 mt-1">{{session('permission')}}</div>
            </div>
        </div>
        <span class="toast-close">✖</span></div>
@endif