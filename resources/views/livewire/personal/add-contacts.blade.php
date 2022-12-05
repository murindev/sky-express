<div class="addressBook" x-init>
    <x-layouts.row class="addressBook-form">
        <h2>Добавить контакт</h2>

        <label class="contrast">
            <input type="text" placeholder="Ф.И.О." wire:model.lazy="contact.fio">
        </label>


        <label class="contrast">
            <input type="text" placeholder="Организация" wire:model.lazy="contact.organisation">
        </label>

        <label class="contrast">
            <input type="text" x-mask="+7 (999) 999 99 99" placeholder="+7 (---) --- -- --"
                   wire:model.lazy="contact.phone">
        </label>

        <x-layouts.select-box wire:model="contact.country_id" placeholder="Страна" :payload="@$countries"
                              :current="@$country"/>

        <livewire:inputs.prompt-select-city placeholder="Город"/>

        <label class="contrast half">
            <input type="text" placeholder="Индекс" wire:model.lazy="contact.zip">
        </label>

        <livewire:inputs.prompt-select-street placeholder="Улица" :city_id="$contact['city_id']"/>

        <label class="contrast half">
            <input type="text" placeholder="Дом/строение" wire:model.lazy="contact.building">
        </label>

        <label class="contrast half">
            <input type="text" placeholder="Квартира/офис" wire:model.lazy="contact.office">
        </label>

        <label class="contrast">
            <textarea placeholder="Доп. информация" wire:model.lazy="contact.info"></textarea>
        </label>

        <label>
            <button class="accent" wire:click="saveContact">Сохранить</button>
        </label>


    </x-layouts.row>
    <x-layouts.row class="addressBook-data">
        <h2>Ваши контакты</h2>

        <label class="regular search">
            <input type="search" placeholder="Поиск" wire:model="search">
            <button class="clean"></button>
        </label>

        <div class="addressBook-contact-wpr scroll">
            @foreach($this->getContacts() as $contact)
                <div class="addressBook-contact">
                    <div class="addressBook-contact_info">
                        <b>
                            {{$contact->fio}}
                            @isset($contact->organisation)
                                / {{$contact->organisation}}
                            @endisset

                        </b>
                        <span class="address">
                           @empty(!$contact->zip)
                                {{$contact->zip}}.
                            @endempty
                            @empty(!$contact->city_name)
                                {{$contact->city_name}}.
                            @endempty
                            @empty(!$contact->street)
                                ул. {{$contact->street}}
                            @endempty
                            @empty(!$contact->building)
                                {{$contact->building}}
                            @endempty
                            @empty(!$contact->office)
                                кв\офис {{$contact->office}}
                            @endempty

                        </span>
                        @isset($contact->phone)
                            <span class="tel">{{$contact->phone}}</span>
                        @endisset

                    </div>
                    <div class="addressBook-contact_btn">
                        <button class="edit" wire:click="editContact({{$contact->id}})"></button>
                        <button class="delete" wire:click="deleteContact({{$contact->id}})"></button>
                    </div>

                </div>
            @endforeach


        </div>


    </x-layouts.row>
</div>
{{--
Иванов Сергей
ООО Пегас
--}}
