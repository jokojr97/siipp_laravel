@foreach($aspirasi as $result)
<div class="bg-light p-3 border">
	<div class="row">
		<div class="col-2 col-md-1">
        	<div  style="margin-top: 5px">
        		@if($result->jenis_kelamin == "Perempuan")
        		<img src="/Assets/images/img_avatar4.png" style="border-radius: 50%;min-width: 50px;max-width: 55px" class="img-responsive">
        		@else
              	<img src="/Assets/images/img_avatar2.png" style="border-radius: 50%;" class="img-fluid">
        		@endif
        	</div>
        </div>
		<div class="col-10 col-md-11">
		    <h6 class="text-capitalize mb-0 mt-2 text-black"><b>
		        @if($result->anonim == 1)
		        Anonim
		        @else
		        {{ $result->pengirim }}
		        @endif</b>
		        <small>
		            &nbsp;&nbsp;(<?= substr($result->no_hp, 0, -6) . 'XXXXXX'; ?>)&nbsp;&nbsp;
		            @if($result->status == 0)
		            <span class=" badge badge-success p-2" >Warga</span>
		            @else
		            <span class=" badge badge-danger p-2" >Admin</span>
		            @endif
		        </small>
		    </h6>			
        	<p style="text-transform: bold">{{$result->tanggal}}</p>
		</div>
    </div>
    <div class="row">
    	<div class="col-12">
    		<p style="text-align: justify;margin-top: 8px">{{$result->isi}}</p>
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
    			@foreach($result->jumlah_komen($result->id) as $hasil)
			    <div class="row" style="margin-left: 10px;margin-top: 10px">
					<div class="well" style="background-color: white;width: 95%">
						<div class="row">
							<div class="col-2 col-md-1">
					        	<div  style="margin-top: 5px">
					        		@if($hasil->jenis_kelamin == "Perempuan")
					        		<img src="/Assets/images/img_avatar4.png" style="border-radius: 50%;min-width: 50px;max-width: 55px" class="img-responsive">
					        		@else
					              	<img src="/Assets/images/img_avatar2.png" style="border-radius: 50%;" class="img-responsive">
					        		@endif
					        	</div>
					        </div>
							<div class="col-10 col-md-11">
							    <h4>
							        @if($hasil->anonim == 1)
							        Anonim
							        @else
							        {{ $hasil->pengirim }}
							        @endif
							        <small>
							            &nbsp;&nbsp;(<?= substr($hasil->no_hp, 0, -6) . 'XXXXXX'; ?>)&nbsp;&nbsp;
							            @if($hasil->status == 0)
							            <span class=" label label-success" >Warga</span>
							            @else
							            <span class=" label label-danger" >Admin</span>
							            @endif
							        </small>
							    </h4>			
					        	<h6 style="text-transform: bold">{{$hasil->tanggal}}</h6>
							</div>
					    </div>
					    <div class="row">
					    	<div class="col-12">
					    		<p style="text-align: justify;margin-top: 8px">{{$hasil->isi}}</p>
					    		@if($hasil->foto)
					    		<div class="row">
					    			<div class="col-sm-3">
					    				<a href="/Assets/proyek/images/komentar/{{$hasil->foto}}" target="_blank" style="margin-left: -10px"><img src="/Assets/proyek/images/komentar/{{$hasil->foto}}" class="img-thumbnail img-responsive"></a>
					    			</div>
					    		</div>
					    		@endif
					    	</div>
					    </div>
					</div>
			  	</div>
    			@endforeach
    		</div>
    		<a href="/proyek/detail/detailkomen/{{$result->id}}" class="btn btn-primary float-right btn-sm" style="margin-right:15px"><i class="fa fa-comment"> Balas</i></a>
    	</div>
    </div>
</div>
@endforeach
