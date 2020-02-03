<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">@yield('title')</div>

                <div class="card-body table-responsive">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                          @yield('thead')
                        </thead>
                        <tbody>
                          @yield('tbody')
                        </tbody>
                      </table>
                      @yield('buttons')
                </div>
            </div>
        </div>
    </div>
</div>
