@extends('layouts.front')

@section('content')
<div class="home">
    <div class="container lg-3">
        @for($j = 0; $j < count($posts)/3+1; $j++)
        
        <div class="row">
             <?php $a=$j*3 ?>
             
            @for($i=$a; $i <$a+3 ; $i++)
            
            @if($i > ($posts->count()-1))
          
            @break
            @endif
             
            <div class="mt-4 ml-5 lg-12">
                <div class="post ">
                    <div class="date">
                        {{ $posts[$i]->updated_at->format('Y年m月d日') }}
                    </div>
                    <div class="title">
                        {{ str_limit($posts[$i]->title, 25) }}
                    </div>
                    <div class="notes mt-3">
                        {{ str_limit($posts[$i]->notes, 15) }}
                        
                    </div>
                    <div class="mt-3">
                         <p><a href="{{ action('Admin\SellController@show' , ['id' => $posts[$i]->id]) }}">詳細</a></p>
                    </div>
                   
                    <div class="image col-lg-12 text-right mt-4">
                        @if ($posts[$i]->image_path)
                            <img src="{{ asset('storage/image/' . $posts[$i]->image_path) }}">
                        @endif
                    </div>
                </div>
            </div>   
            @endfor
        </div> 
         @endfor
    </div>
</div>    
    <div class="container">
    <div id=pagi>
        <div class="row">
    {{ $posts->links() }}
</div>
</div>
</div>


    

@endsection