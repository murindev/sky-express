<h3>Калькулятор стоимости доставки</h3>
<fieldset >
    <label x-data="{from: ''}" data-type="prompt" @click.outside="from = ''">
        <span class="prompt-wpr" x-show="from.length > 3">
            <a href="javascript:"  @click="from = 'г. Москва, ул. Зеленоградск ...'">г. Москва, ул. Зеленоградск ...</a>
            <a href="javascript:"  @click="from = 'г. Москва, ш. Дмитровское, 102 ...'">г. Москва, ш. Дмитровское, 102 ...</a>
            <a href="javascript:"  @click="from = 'г. Москва, ул. Зеленоградск ...'">г. Москва, ул. Зеленоградск ...</a>
            <a href="javascript:"  @click="from = 'г. Москва, ш. Дмитровское, 102 ...'">г. Москва, ш. Дмитровское, 102 ...</a>
        </span>
        <span class="placeholder i-map-point mid">
            <b>Откуда:</b>
            <input type="text" class="thin" x-model="from"/>
        </span>
    </label>

    <div class="change-holder">
        <button class="clean change"></button>
    </div>

    <label x-data="{to: ''}" data-type="prompt" @click.outside="to = ''">
        <span class="prompt-wpr" x-show="to.length > 3">
            <a href="javascript:"  @click="to = 'г. Москва, ул. Зеленоградск ...'">г. Москва, ул. Зеленоградск ...</a>
            <a href="javascript:"  @click="to = 'г. Москва, ш. Дмитровское, 102 ...'">г. Москва, ш. Дмитровское, 102 ...</a>
            <a href="javascript:"  @click="to = 'г. Москва, ул. Зеленоградск ...'">г. Москва, ул. Зеленоградск ...</a>
            <a href="javascript:"  @click="to = 'г. Москва, ш. Дмитровское, 102 ...'">г. Москва, ш. Дмитровское, 102 ...</a>
        </span>
        <span class="placeholder i-map-point mid">
            <b>Куда:</b>
            <input type="text" class="thin" x-model="to"/>
        </span>
    </label>

    <div x-data="{active: false, model: '', currentTab: 'PackageStandard', standardId: 0}" data-type="promptSelect" @click.outside="active = false">

        <input type="checkbox" class="promptSelect-chb" id="package" x-model="active" />
        <label class="promptSelect-trigger" :class="active ? 'i-chevron' : 'i-chevron-bottom'" for="package" x-text="model"></label>

        <div class="promptSelect-wpr">
            <div class="promptSelect-tabs">
                <button class="promptSelect-tab" :class="currentTab === 'PackageStandard' ? 'active' : ''" @click="currentTab = 'PackageStandard'">Примерно</button>
                <button class="promptSelect-tab" :class="currentTab === 'PackageCustom' ? 'active' : ''" @click="currentTab = 'PackageCustom'">Точные размеры</button>
            </div>

            <div class="promptSelect-body">

                <div class="package-standard" x-show="currentTab === 'PackageStandard'">
                    <input type="radio" id="25" x-model="standardId" value="25"/>
                    <label @click="model = 'Конверт с документами'" for="25" :class="standardId == 25 ? 'active' : ''"><span>Конверт с документами</span>290 х 210 х 10 мм до 0,5 кг</label>
                </div>

                <div class="package-standard" x-show="currentTab === 'PackageStandard'">
                    <input type="radio" id="26" x-model="standardId" value="26"/>
                    <label @click="model = 'Коробка маленькая'" for="26" :class="standardId == 26 ? 'active' : ''"><span>Коробка маленькая</span>200 х 200 х 200 мм до 4х кг</label>
                </div>

                <div class="package-standard" x-show="currentTab === 'PackageStandard'">
                    <input type="radio" id="27" x-model="standardId" value="27"/>
                    <label @click="model = 'Коробка средняя'" for="27" :class="standardId == 27 ? 'active' : ''"><span>Коробка средняя</span>400 х 400 х 400 мм до 4х кг</label>
                </div>

                <div class="package-standard" x-show="currentTab === 'PackageStandard'">
                    <input type="radio" id="28" x-model="standardId" value="28"/>
                    <label @click="model = 'Негабаритный груз'" for="28" :class="standardId == 28 ? 'active' : ''"><span>Негабаритный груз</span></label>
                </div>



                <div class="package-custom">

                    <label class="regular">
                        <span>Длина, мм <sup>*</sup></span>
                        <input type="number" class="light" x-model="length" placeholder="290 мм"/>
                    </label>

                    <label class="regular">
                        <span>Ширина, мм <sup>*</sup></span>
                        <input type="number" class="light" x-model="width" placeholder="210 мм"/>
                    </label>

                    <label class="regular">
                        <span>Высота, мм <sup>*</sup></span>
                        <input type="number" class="light" x-model="height" placeholder="10 мм"/>
                    </label>

                    <label class="regular">
                        <span>Вес, кг <sup>*</sup></span>
                        <input type="number" class="light" x-model="weight" placeholder="до 0,5 кг"/>
                    </label>


                    <button class="accent">Применить</button>

                </div>

            </div>

        </div>

    </div>

    <button class="accent">Рассчитать стоимость доставки</button>

</fieldset>


<script>

</script>
