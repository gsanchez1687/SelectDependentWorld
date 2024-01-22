@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Select Dependent World') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div>
                        <label for="countries">Pais</label>
                        <select onchange="loadstate(this)" name="countries" id="countries" class="form-select js-example-basic-single" aria-label="countries">
                            <option selected>Seleccione un pais</option>
                            @foreach($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                          </select>
                    </div>

                    <div>
                        <label for="states">Estados</label>
                        <select onchange="loadCities(this)" class="form-select js-example-basic-single" name="" name="states" id="states" aria-label="states">
                            <option selected>Seleccione un departamento o estado</option>
                           
                          </select>
                    </div>

                    <div>
                        <label for="cities">Ciudades</label>
                        <select class="form-select js-example-basic-single" name="cities" id="cities" aria-label="cities">
                            <option selected>Seleccione una ciudad</option>
                          </select>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    //Aqui se carga los estados de un pais seleccionado
    function loadstate(selectCountries){
        let countryId = selectCountries.value;
        fetch('/api/country/states/' + countryId).then(function(response) {
                return response.json();
            }).then(function(data) {
                let states = document.getElementById('states');
                states.innerHTML = '';
                buildStateSelect(data);
            })
    }

    
    function buildStateSelect(data){
        let states = document.getElementById('states');
            data.forEach(function(state) {
                let option = document.createElement('option');
                option.value = state.id;
                option.innerHTML = state.name;
                states.append(option);
            })
    }

    function loadCities(selectCities){
        let stateId = selectCities.value;
        fetch('/api/state/cities/' + stateId).then(function(response) {
                return response.json();
            }).then(function(data) {
                let cities = document.getElementById('cities');
                cities.innerHTML = '';
                buildCitiesSelect(data);
            })
    }

    function buildCitiesSelect(data){
        let cities = document.getElementById('cities');
            data.forEach(function(city) {
                let option = document.createElement('option');
                option.value = city.id;
                option.innerHTML = city.name;
                cities.append(option);
            })
    }
</script>
@endsection
