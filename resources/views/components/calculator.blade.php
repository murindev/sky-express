<div class="calculator" x-data="{radio: 'tab-calc'}">
   @foreach($steps as $tab)
        <input type="radio" id="{{$tab['id']}}" name="calculator"  value="{{$tab['id']}}" x-model="radio" />
        <label class="calculator-tab" for="{{$tab['id']}}" >
            <span rel="{{$tab['nr']}}">{{$tab['title']}}</span>
        </label>
        <div rel="{{$tab['id']}}" class="calculator-item {{$tab['id']}}"  style="width:100%; order: 10">
            <x-dynamic-component :component="'calculator-tabs.'.$tab['component']" class="mt-4"/>
        </div>
   @endforeach
</div>
