@extends("master.navbar")
@section("content")

    <section class="clean-block clean-product dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">{{$ad->title}}</h2>
                <p></p>
            </div>
            <div class="block-content">
                <div class="product-info">
                    <div class="row">
                        <div class="col-md-6">
                            <br>
                            <h3 style="color: orangered">Attention! </h3>
                            <br>
                            <h6><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-calendar-check-fill" viewBox="0 0 16 16" style="margin-top:-8px;" >
                                    <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-5.146-5.146-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                                </svg> Période de réservation:</h6>
                            <h6>Du <span style="font-weight:bold;">{{$start}}</span> Au <span style="font-weight:bold ;">{{$end}}</span></h6>
                            <hr>
                            <h6>+ Objet disponible dans ces jours:</h6>
                            @foreach($availableDay as $day)
                            <h6><i class="fa fa-check" style="font-size: 10px;"></i> {{$day}}</h6>
                            @endforeach
                            <br>
                            <hr>
                            <h6><svg xmlns="http://www.w3.org/2000/svg" style="margin-top:-8px;" width="20" height="20" fill="currentColor" class="bi bi-cash-stack" viewBox="0 0 16 16">
                                    <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1H1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                                    <path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V5zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2H3z"/>
                                </svg> Prix Total de la location:<span style="font-weight: bold";> {{ $nbDays*$ad->price}}</span> DH</h6>
                            <br>

                             </div>
                        <div class="col-md-6">
                            <br>
                            <h3 style="color: orangered">
                                <svg xmlns="http://www.w3.org/2000/svg" style="color: orangered ; margin-top: -8px;" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
                                    <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/>
                                    <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/>
                                </svg>
                                Conditions d'utilisation </h3>
                            <br>
                            <h6>Découvrir nos conditions d'utilisation de notre platform</h6>
                            <a   data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                               pour plus de détails,<span style="color: orangered; cursor: pointer; font-weight: bold">cliquez ici...</span>
                            </a>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 style="color: red; font-weight: bold"; class="modal-title fs-5" id="staticBackdropLabel">Conditions d'utilisation </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                          <p>
                                       <span style="font-weight: bold">1- Utilisation du site web</span> <br>
                                        Notre site web est destiné à être utilisé uniquement pour la location d'objets. Vous ne pouvez pas utiliser notre site web à des fins illégales ou pour perturber ou endommager le fonctionnement de notre site web ou des serveurs connectés à notre site web.

                                              <br><br>
                                              <span style="font-weight: bold">2-Comptes d'utilisateurs</span> <br>
                                        Pour utiliser certains services sur notre site web, vous devez créer un compte d'utilisateur. Vous êtes responsable de la sécurité de votre compte et de votre mot de passe, ainsi que de toutes les activités effectuées sous votre compte. Vous ne pouvez pas partager votre compte avec d'autres personnes. Si vous pensez que votre compte a été compromis, vous devez nous en informer immédiatement.
                                              <br><br>
                                              <span style="font-weight: bold">3-Réservations</span> <br>
                                        Vous pouvez réserver des objets sur notre site web en suivant les étapes indiquées sur le site web. Les réservations sont soumises à disponibilité et à confirmation. Vous êtes responsable de fournir des informations précises et complètes lors de la réservation. Les frais de location et les frais de caution sont indiqués sur notre site web et peuvent être modifiés sans préavis.

                                              <br><br>
                                              <span style="font-weight: bold">4- Annulations et remboursements</span> <br>
                                        Les politiques d'annulation et de remboursement sont indiquées sur notre site web et peuvent varier en fonction de l'objet loué. Les annulations et les remboursements sont soumis à nos politiques de location. Si vous annulez votre réservation, les frais d'annulation peuvent s'appliquer.

                                              <br><br>
                                              <span style="font-weight: bold">5- Responsabilité</span> <br>
                                        Nous ne sommes pas responsables des dommages directs ou indirects résultant de l'utilisation de notre site web ou de l'impossibilité d'utiliser notre site web. Nous ne sommes pas responsables des dommages résultant de l'utilisation d'objets loués sur notre site web. Vous êtes responsable de la perte, du vol ou de tout dommage causé à l'objet loué pendant la période de location.

                                              <br><br>
                                              <span style="font-weight: bold">6- Modification des conditions d'utilisation</span> <br>
                                        Nous nous réservons le droit de modifier ces conditions d'utilisation à tout moment et sans préavis. Les modifications prendront effet dès leur publication sur notre site web. Il est de votre responsabilité de vérifier régulièrement ces conditions d'utilisation pour prendre connaissance d' éventuelles modifications.
                                          </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div >
                                <input type="radio" name="isAccepted" id="accepted" checked/><label> &nbsp; J'accepte toutes les conditions</label>
                                <br>
                                <input type="radio"  name="isAccepted" id="notAccepted" /><label>&nbsp; Je refuse</label>
                            </div>
                        </div>
                        <div class="block-heading" style="margin-top: -60px" >
                            <form method="post">
                            <button  type="submit" name="sumbit" id="sendRes" class="btn btn-success" style="margin-left: 5px;background-color: orangered;border: none; " type="submit"><svg xmlns="http://www.w3.org/2000/svg"  style="margin-top:-8px;" width="18" height="18" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
                                    <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                                    <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                                </svg> Je confirme ma réservation
                            </button>
                            </form>
                            <a href="" class="btn btn-success" style="margin-left: 5px;background-color: orangered;border: none; " type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" style="margin-top:-8px;"width="18" height="18" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                                Annuler la réservation</a>
                        </div>
                    </div>
                </div>

            </div>


        </div>

    </section>
<script>

    const acceptedCheckbox = document.getElementById('accepted');
    const notAcceptedCheckbox = document.getElementById('notAccepted');
    const sendButton = document.getElementById('sendRes');

    acceptedCheckbox.addEventListener('change', () => {
        if (acceptedCheckbox.checked) {
            sendButton.disabled = false;
        } else {
            sendButton.disabled = true;
        }
    });

    notAcceptedCheckbox.addEventListener('change', () => {
        if (notAcceptedCheckbox.checked) {
            sendButton.disabled = true;
        } else {
            sendButton.disabled = false;
        }
    });


</script>

@endsection

