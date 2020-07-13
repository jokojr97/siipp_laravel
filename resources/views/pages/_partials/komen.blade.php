@foreach($aspirasi as $result)
<div class="well">
	<div class="row">
		<div class="col-xs-3 col-md-1">
        	<div  style="margin-top: 5px">
        		@if($result->jenis_kelamin == "Perempuan")
        		<img src="/Assets/images/img_avatar4.png" style="border-radius: 50%;min-width: 50px;max-width: 55px" class="img-responsive">
        		@else
              	<img src="/Assets/images/img_avatar2.png" style="border-radius: 50%;" class="img-responsive">
        		@endif
        	</div>
        </div>
		<div class="col-xs-8 col-md-9">
		    <h4>
		        @if($result->anonim == 1)
		        Anonim
		        @else
		        {{ $result->pengirim }}
		        @endif
		        <small>
		            &nbsp;&nbsp;(<?= substr($result->no_hp, 0, -6) . 'XXXXXX'; ?>)&nbsp;&nbsp;
		            @if($result->status == 0)
		            <span class=" label label-success" >Warga</span>
		            @else
		            <span class=" label label-danger" >Admin</span>
		            @endif
		        </small>
		    </h4>			
		</div>
		<div class="col-xs-1 col-md-2">
			{{$result->tanggal}}
		</div>
    </div>
    <div class="row">
    	<div class="col-xs-12">
    		<p style="text-align: justify;">{{$result->isi}}</p>
    		@if($result->foto)
    		<div class="row">
    			<div class="col-sm-3">
    				<a href="/Assets/proyek/images/komentar/{{$result->foto}}" target="_blank" style="margin-left: -10px"><img src="/Assets/proyek/images/komentar/{{$result->foto}}" class="img-thumbnail img-responsive"></a>
    			</div>
    		</div>
    		@endif

		    @php
		    if($result->jumlah_komen($result->id)){
		        $coment = count($result->jumlah_komen($result->id));
		    }else {
		        $coment = 0;
		    }
		    @endphp

    		<a href="#demo{{$loop->iteration}}" data-toggle="collapse" data-target="#demo{{$loop->iteration}}">Tampilkan balasan({{ $coment }}) <span class="glyphicon glyphicon-chevron-down"></span></a>
    		<div class="row collapse" id="demo{{$loop->iteration}}" style="margin-left: 25px">
    			<div>
				    <div class="row">
				    	<div class="col-xs-3 col-md-1">
				    		jokorey
				    	</div>
				  	</div>
			  	</div>

    		</div>
    	</div>
    </div>
</div>
@endforeach
