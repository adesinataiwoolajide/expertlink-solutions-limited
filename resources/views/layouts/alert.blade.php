
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <span class="fw-semibold">Well done!</span> {!!session('success')!!} 
        <a href="#" class="alert-link"></a>.
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if(session('error'))

     <div class="alert alert-danger alert-dismissible fade show">
        <span class="fw-semibold">Error!</span> {!! session('error')!!} 
        <a href="#" class="alert-link">try submitting again</a>.
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
   
@endif

@if(session('status'))
    
    <div class="alert alert-success alert-dismissible fade show">
        <span class="fw-semibold">Well done!</span> {!!session('status')!!} 
        <a href="#" class="alert-link"></a>.
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>

@endif


