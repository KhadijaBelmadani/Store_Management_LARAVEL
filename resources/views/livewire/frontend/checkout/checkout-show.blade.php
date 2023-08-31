<div>
    <div class="py-3 py-md-4 checkout">
        <div class="container">
            <h4 style="color:rgb(248, 169, 12);font-weight:bold;"><i class="fa-solid fa-money-check-dollar"></i> Paiement:</h4>
            <hr>
            @if ( $this->totalprodAmount !='0')

            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="shadow bg-white p-3">
                        <h4 class="text-primary"  style="color: blue;font-weight:bold">
                            Le Prix Total :
                            <span class="float-end">{{ $this->totalprodAmount }} Dh</span>
                        </h4>
                        {{-- <hr>
                        <small>* Items will be delivered in 3 - 5 days.</small>
                        <br/>
                        <small>* Tax and other charges are included ?</small> --}}
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                        <h4 class="text-primary"  style="color: blue;font-weight:bold">
                             Informations
                        </h4>
                        <hr>


                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Nom complet</label>
                                    <input type="text" wire:model.deferr="fullname" id="fullname" class="form-control" placeholder="EntrerLe Nom Complet" />
                                    @error('fullname')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Phone</label>
                                    <input type="number" wire:model.lazy="phone" id="phone" class="form-control" placeholder="Entrer Le Numéros De Télephone" />
                                    @error('phone')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Address Email</label>
                                    <input type="email" wire:model.defer="email" id="email" class="form-control" placeholder="Entrer l'Email Address" />
                                    @error('email')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Code Postal</label>
                                    <input type="number" wire:model.lazy="codepostal" id="codepostal" class="form-control" placeholder="Entrer Le code postal" />
                                    @error('codepostal')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Address</label>
                                    <textarea wire:model.lazy="address" id="address" class="form-control" rows="2"></textarea>
                                    @error('address')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3" wire:ignore>
                                    <label>Sélectionner Le Mode De Paiement: </label>
                                    <div class="d-md-flex align-items-start">
                                        <div class="nav col-md-3 flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <button wire:loading.attr="disabled" class="nav-link active fw-bold" id="cashOnDeliveryTab-tab" data-bs-toggle="pill" data-bs-target="#cashOnDeliveryTab" type="button" role="tab" aria-controls="cashOnDeliveryTab" aria-selected="true">Paiement à La Livraison</button>
                                            <button wire:loading.attr="disabled" class="nav-link fw-bold" id="onlinePayment-tab" data-bs-toggle="pill" data-bs-target="#onlinePayment" type="button" role="tab" aria-controls="onlinePayment" aria-selected="false">Paiement en ligne</button>
                                        </div>
                                        <div class="tab-content col-md-9" id="v-pills-tabContent">
                                            <div class="tab-pane active show fade" id="cashOnDeliveryTab" role="tabpanel" aria-labelledby="cashOnDeliveryTab-tab" tabindex="0">
                                                <h6>Mode De Paiement à La Livraison</h6>
                                                <hr/>
                                                <button type="button" wire:loading.attr="disabled" wire:click="codOrder" class="btn btn-primary">
                                                    <span wire:loading.remove wire:target="codOrder">
                                                        Passer La Commande (Paiement à La Livraison)
                                                    </span >

                                                    <span wire:loading wire:target="codOrder">
                                                        Passage de la commande
                                                    </span>

                                                </button>

                                            </div>
                                            <div class="tab-pane fade" id="onlinePayment" role="tabpanel" aria-labelledby="onlinePayment-tab" tabindex="0">
                                                <h6>Mode De Paiement En Ligne</h6>
                                                {{-- <hr/> --}}
                                                {{-- <button wire:loading.attr="disabled" type="button" class="btn btn-warning">Payer Maintenant (Paiement en ligne)</button> --}}
                                                <div>
                                                    <div id="paypal-button-container" style="width:40px"></div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>


                    </div>
                </div>

            </div>
            @else
            <div class="card card-body shadow text-center p-md-5">
                <h5 style="color:rgb(248, 169, 12);font-weight:bold;">
                   Pas d'élements Dans La Carte Pour Payer
                    <a href="{{url('/collections')}}" class="btn btn-warning text-white" style="font-weight: bold" >&nbsp;&nbsp;Achetez Maintenant</a>
                </h5>
            </div>
            @endif
        </div>
    </div>

</div>
@push('scripts')
    <script src="https://www.paypal.com/sdk/js?client-id=AdbrULtP1cCDxcYcWgJ9VxVgdp3I0Bwf7u0lKG_5tpGP_0PIh1ktiTbzbEZAJtPnjktjFPWMJQOmlZAW&currency=USD"></script>
    {{-- <script src="https://www.paypal.com/sdk/js?client-id=AdbrULtP1cCDxcYcWgJ9VxVgdp3I0Bwf7u0lKG_5tpGP_0PIh1ktiTbzbEZAJtPnjktjFPWMJQOmlZAW&currency=EUR&intent=order&commit=false&vault=true"></script> --}}
    <script>
        paypal.Buttons({
            onClick:function()
            {
                 if(   !document.getElementById('fullname').value
                    || !document.getElementById('phone').value
                    || !document.getElementById('email').value
                    || !document.getElementById('codepostal').value
                    || !document.getElementById('address').value

                 )
                 {
                    Livewire.emit('validationForAll');
                    return false;
                 }
                 else{
                    @this.set('fullname',document.getElementById('fullname').value);
                    @this.set('phone',document.getElementById('phone').value);
                    @this.set('email',document.getElementById('email').value);
                    @this.set('codepostal',document.getElementById('codepostal').value);
                    @this.set('address',document.getElementById('address').value);
                 }
            },

          // Order is created on the server and the order id is returned
          createOrder() {
            return fetch("/my-server/create-paypal-order", {
              method: "POST",
              headers: {
                "Content-Type": "application/json",
              },
              // use the "body" param to optionally pass additional order information
              // like product skus and quantities
              body: JSON.stringify({
                cart: [
                  {
                    sku: "YOUR_PRODUCT_STOCK_KEEPING_UNIT",
                    quantity: "YOUR_PRODUCT_QUANTITY",
                  },
                ],
              }),
            })
            .then((response) => response.json())
            .then((order) => order.id);
          },
          // Finalize the transaction on the server after payer approval
          onApprove(data) {
            return fetch("/my-server/capture-paypal-order", {
              method: "POST",
              headers: {
                "Content-Type": "application/json",
              },
              body: JSON.stringify({
                orderID: data.orderID
              })
            })
            .then((response) => response.json())
            .then((orderData) => {
              // Successful capture! For dev/demo purposes:
              console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
              const transaction = orderData.purchase_units[0].payments.captures[0];
              if(transaction.status=="COMPLETED"){
                Livewire.emit('transactionEmit',transaction.id);
              }
            //   alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);

            });
          }
        }).render('#paypal-button-container');
      </script>
@endpush
