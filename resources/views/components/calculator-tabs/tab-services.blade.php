<div class="tab-services-wpr">
    <div class="tab-services-comment">
        <h3>Комментарий к заказу</h3>
        <textarea wire:model.lazy="comment"></textarea>
    </div>
    <div class="tab-services-options">
        <h3>Дополнительные услуги</h3>

        <div class="tab-services-option">

            <label class="switcher">
                <input type="checkbox" wire:model="insurance"/>
                <i></i>
                <span>
          Страховка
          <small rel="текст подсказки"></small>
        </span>
            </label>

            <div class="tab-services-cost">
                <p>
                    Оценочная стоимость отправления, ₽:
                </p>

                <label class="regular ">
                    <input type="number" @if(!$this->insurance) disabled @endif placeholder="250 ₽" wire:model.lazy="packagesCost"/>
                </label>

                <span>+ {{$this->insuranceCost}} ₽</span>
            </div>

            <label class="switcher">
                <input type="checkbox" wire:model="refund"/>
                <i></i>
                <span>
          С возвратом
          <small rel="текст подсказки"></small>
        </span>
            </label>

        </div>

    </div>

    <div class="tab-services-sbt">
        <button class="accent" wire:click="$emit('onCalculateCheckout')">Оформить заказ</button> {{--   wire:click="makeOrder()" --}}
    </div>
</div>
