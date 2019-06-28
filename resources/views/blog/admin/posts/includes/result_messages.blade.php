@if($errors->any())
 <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>
              <ul>
                  @foreach($errors->all() as $errorTex)
                  <li>{{ $errorTex }}</li>
                  @endforeach
              </ul>
          </strong>
          
        </div>
          @endif
          
          @if(session('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>{{ session()->get('success') }}</strong>
        </div>
            @endif    

