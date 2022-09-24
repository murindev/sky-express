@extends('templates.personal')
@section('personal')
    <div class="addressBook">
        <x-layouts.row class="addressBook-form">
            <h2>Добавить контакт</h2>

            <label class="contrast">
                <input type="text" placeholder="Ф.И.О.">
            </label>

            <label class="contrast">
                <input type="text" placeholder="Организация">
            </label>

            <label class="contrast">
                <input type="text" placeholder="+7 (---) --- -- --">
            </label>
            <x-layouts.select-box placeholder="Страна"></x-layouts.select-box>

            <x-layouts.select-box placeholder="Город"></x-layouts.select-box>

            <label class="contrast">
                <input type="text" placeholder="Организация">
            </label>

            <label class="contrast half">
                <input type="text" placeholder="Индекс">
            </label>

            <label class="contrast half">
                <input type="text" placeholder="Улица">
            </label>

            <label class="contrast half">
                <input type="text" placeholder="Дом/строение">
            </label>

            <label class="contrast half">
                <input type="text" placeholder="Квартира/офис">
            </label>

            <label class="contrast">
                <textarea placeholder="Доп. информация"></textarea>
            </label>

            <label>
                <button class="accent">Сохранить</button>
            </label>


        </x-layouts.row>
        <x-layouts.row class="addressBook-data">
            <h2>Ваши контакты</h2>

            <label class="regular search">
                <input type="search" placeholder="Поиск">
                <button class="clean"></button>
            </label>

            <div class="addressBook-contact-wpr scroll">
                <div class="addressBook-contact">
                    <div class="addressBook-contact_info">
                        <b>Сабаева Марина / ООО "ТЕЛКОМНЭТ"</b>
                        <span class="address">г. Москва, ул. Зеленоградская, 17</span>
                        <span class="tel">+7 903 119 21 51</span>
                    </div>
                    <div class="addressBook-contact_btn">
                        <button class="edit"></button>
                        <button class="delete"></button>
                    </div>

                </div>

                <div class="addressBook-contact">
                    <div class="addressBook-contact_info">
                        <b>Сабаева Марина / ООО "ТЕЛКОМНЭТ"</b>
                        <span class="address">г. Москва, ул. Зеленоградская, 17</span>
                        <span class="tel">+7 903 119 21 51</span>
                    </div>
                    <div class="addressBook-contact_btn">
                        <button class="edit"></button>
                        <button class="delete"></button>
                    </div>

                </div>

                <div class="addressBook-contact">
                    <div class="addressBook-contact_info">
                        <b>Сабаева Марина / ООО "ТЕЛКОМНЭТ"</b>
                        <span class="address">г. Москва, ул. Зеленоградская, 17</span>
                        <span class="tel">+7 903 119 21 51</span>
                    </div>
                    <div class="addressBook-contact_btn">
                        <button class="edit"></button>
                        <button class="delete"></button>
                    </div>

                </div>

                <div class="addressBook-contact">
                    <div class="addressBook-contact_info">
                        <b>Сабаева Марина / ООО "ТЕЛКОМНЭТ"</b>
                        <span class="address">г. Москва, ул. Зеленоградская, 17</span>
                        <span class="tel">+7 903 119 21 51</span>
                    </div>
                    <div class="addressBook-contact_btn">
                        <button class="edit"></button>
                        <button class="delete"></button>
                    </div>

                </div>

                <div class="addressBook-contact">
                    <div class="addressBook-contact_info">
                        <b>Сабаева Марина / ООО "ТЕЛКОМНЭТ"</b>
                        <span class="address">г. Москва, ул. Зеленоградская, 17</span>
                        <span class="tel">+7 903 119 21 51</span>
                    </div>
                    <div class="addressBook-contact_btn">
                        <button class="edit"></button>
                        <button class="delete"></button>
                    </div>

                </div>

                <div class="addressBook-contact">
                    <div class="addressBook-contact_info">
                        <b>Сабаева Марина / ООО "ТЕЛКОМНЭТ"</b>
                        <span class="address">г. Москва, ул. Зеленоградская, 17</span>
                        <span class="tel">+7 903 119 21 51</span>
                    </div>
                    <div class="addressBook-contact_btn">
                        <button class="edit"></button>
                        <button class="delete"></button>
                    </div>

                </div>
            </div>


            {{--            <custom-scrollbar :auto-hide="false" class="addressBook-contacts" >--}}

{{--            <div class="scrollbar__wrapper">
                <div class="scrollbar__scroller addressBook-contacts scroll">


                </div>
            </div>--}}





            {{--            </custom-scrollbar>--}}


        </x-layouts.row>
    </div>
@endsection


{{--

<div class="example scroll">

    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus varius euismod justo, et luctus leo
        laoreet ac. Vestibulum suscipit lobortis turpis, at posuere lacus dignissim nec. Nulla bibendum interdum
        lectus, a mattis nisl vulputate quis. Maecenas non ligula cursus, luctus quam vitae, ultricies lorem.
        Nulla porta libero vel suscipit euismod. Praesent vel metus ac dolor semper placerat a et libero. Proin
        vitae facilisis augue, sed hendrerit nisl. Suspendisse ac suscipit mi. Vestibulum ante ipsum primis in
        faucibus orci luctus et ultrices posuere cubilia Curae; Vestibulum ut aliquet libero, non fermentum
        nibh. Praesent vestibulum, enim et vehicula accumsan, erat augue porta arcu, eget dictum metus orci eu
        erat. Proin facilisis convallis dolor eu lacinia. Integer sagittis augue vitae fringilla interdum. Morbi
        et tortor commodo turpis laoreet pulvinar.</p>
    <p>Maecenas tincidunt laoreet libero nec viverra. Nullam volutpat tortor non dolor elementum tristique.
        Etiam vel odio eget ipsum convallis faucibus. Pellentesque sagittis orci in massa consequat
        sollicitudin. Nulla facilisi. Nam magna leo, rutrum sed felis vitae, tincidunt tristique nunc. Etiam
        eget velit at magna finibus commodo eget sit amet leo. Nullam eleifend, neque auctor viverra lacinia,
        ante ante tincidunt velit, sed egestas odio nulla eget tellus. Morbi hendrerit viverra erat nec
        ultrices. Nam odio mauris, bibendum nec nunc id, consectetur ultricies magna. In mollis, lectus
        tincidunt condimentum iaculis, nunc neque tincidunt neque, suscipit consequat nibh lorem a arcu. Nunc
        elementum velit metus, a scelerisque justo fermentum lobortis. Sed ut tortor tincidunt, tempus neque
        quis, ullamcorper arcu.</p>
    <p>Nulla facilisi. Cras eu augue aliquam, condimentum leo sollicitudin, tincidunt orci. Fusce ut felis
        eleifend, rhoncus magna ac, auctor risus. Ut arcu diam, ultrices vel urna vel, accumsan aliquet felis.
        Maecenas posuere tincidunt sapien, non suscipit turpis. Integer blandit nunc quis odio mollis faucibus.
        Cras non libero vitae elit aliquet dictum ut at dolor. Nulla commodo ante turpis, ut faucibus mi viverra
        et. Aenean placerat velit id eros convallis placerat. Aenean imperdiet consequat lacus, vel dictum
        turpis condimentum nec. Donec vel magna quis neque sagittis ultricies non id tellus. Sed eu pellentesque
        quam. Aenean maximus vestibulum neque ac porta. Phasellus pharetra sem in nisl feugiat, eget ultricies
        nisi accumsan. Vivamus accumsan, sapien sit amet consequat faucibus, eros diam ultricies orci,
        consectetur ultrices lorem arcu eu dolor. Praesent rhoncus luctus lacus in dapibus.</p>
    <p>Sed feugiat ex vel accumsan hendrerit. Ut blandit aliquet metus, eu auctor sem faucibus quis. In eu
        ornare nisl. Morbi sit amet sapien fermentum, fringilla sapien id, sagittis ligula. In et lectus ut ante
        tempor luctus. Sed id elit ut enim finibus sollicitudin quis vitae nibh. Donec non tortor dolor. Donec
        dignissim mattis dolor, a ullamcorper purus aliquet ut. Ut egestas mi ligula, at aliquam odio egestas
        et. Donec id fringilla neque. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut lobortis
        aliquam lacinia. Praesent tempus lectus risus, eu vulputate sem auctor aliquet. Nulla vel maximus
        libero. Phasellus congue semper arcu, sed scelerisque nisi.</p>
    <p>Aenean a venenatis enim. Duis eget venenatis risus, vel interdum nisi. Maecenas at pharetra tortor.
        Nullam a massa vel ex lobortis lacinia et et lacus. Donec faucibus tellus neque, nec fringilla risus
        porta eget. Nam eu metus non sapien congue accumsan ac eu lectus. Suspendisse nec lobortis purus. Donec
        elementum lorem vitae mauris vestibulum eleifend. Aliquam dignissim, dolor et tempor bibendum, metus
        urna dapibus quam, vitae convallis felis mauris congue tortor.</p>

</div>

--}}
