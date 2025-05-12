<div class="row mt-3">
            <div class="col-md-12 d-flex flex-column justify-content-flex align-items-start justify-content-md-end">
                <button class="toggle-btn mb-2" onclick="toggleSidebar()">
                    ☰ Menu
                </button>
                <div class="d-flex gap-2 align-items-start justify-content-between justify-content-md-end w-100">
                    <div class="loged-in-user rounded">
                        <p class="text-capitalize"><strong>Name</strong> : {{ Auth::user()->name }}  </p>
                        <p class="text-capitalize"><strong>Registration Number :</strong> D{{ str_pad((100000+Auth::id()), 6, '0', STR_PAD_LEFT) }}</p>
                    </div>
                    <a href="{{route('user.logout')}}" class="btn btn-danger">logout</a>
                </div>
            </div>
        </div>
