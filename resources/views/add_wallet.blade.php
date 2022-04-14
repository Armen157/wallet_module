<x-app-layout>
    <div class="container mt-3 d-flex justify-content-center">

    <div class="card w-50">
        <div class="card-body">

            <div class="d-flex justify-content-center">
                <img style="width: 150px; height: 150px;" src="{{asset('images/wallet_logo_1.png')}}" />
            </div>

            <div class="d-flex justify-content-center mt-3">
                <h4>Please Add Wallet</h4>
            </div>

            <div class="form-block form-block--add-wallet d-flex justify-content-center mt-3">

            {!! Form::model($item, ['method' => 'POST', 'route' => ['store.wallet'], 'enctype' => 'multipart/form-data']) !!}

            <!-- Wallet Name -->
            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                @if ($errors->has('name'))
                    <span class="help-block" style="color: red">
                         <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
                {!! Form::text('name','',['class'=>'input-effect form-control', 'placeholder'=>'', 'id'=>'name']  ) !!}
            </div>

            <!-- Wallet Type -->
            <div class="form-group">
                {!! Form::label('type', 'Type:') !!}
                {{ Form::select('wallet_type', ["Credit"=>"Credit","Cash"=>"Cash"], "Credit", ['class'=>'input-effect form-control','id' => 'type']) }}
            </div>

            <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded w-full">Button</button>

            {!! Form::close() !!}

            </div>

        </div>
    </div>

</div>
</x-app-layout>
