@props(['data'])
    
        {{ $data->appends(request()->except(['_token']))->links() }}
    
