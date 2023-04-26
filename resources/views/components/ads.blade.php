@php
if(!isset($cat_ids)) $cat_ids = "";
if(!isset($cities)) $cities = "";
if(!isset($price)) $price = "";


@endphp
<section class="clean-block clean-catalog dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Annonces</h2>

            </div>
            <div class="content">

                <div class="row">
                    <div class="col-md-3">
                        <div class="d-none d-md-block">
                            <div class="filters">
                                <div class="filter-item">
                                    <h3>Categories</h3>
                                    @foreach($all_categories as $cat)
                                        <div class="form-check"><input class="form-check-input" type="checkbox" name="categorie"
                                                                       id="formCheck-{{$cat->category_id}}" value="{{$cat->category_id}}" onchange="redirectToPage()"  @php if(strstr($cat_ids,$cat->category_id)) echo "checked" @endphp><label class="form-check-label"
                                                                                                                                                                                           for="formCheck-{{$cat->category_id}}">{{$cat->name}}</label>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="filter-item">
                                    <h3>Villes</h3>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" name="city"
                                                                       value="Casablanca" onchange="redirectToPage()"  @php if(strstr($cities,"Casablanca")) echo "checked" @endphp><label class="form-check-label">Casablanca</label>
                                        </div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" name="city"
                                                                   value="Tetouan" onchange="redirectToPage()" @php if(strstr($cities,"Tetouan")) echo "checked" @endphp><label class="form-check-label">Tetouan</label>
                                    </div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" name="city"
                                                                   value="tanger" onchange="redirectToPage()" @php if(strstr($cities,"Tetouan")) echo "checked" @endphp><label class="form-check-label">Tanger</label>
                                    </div>
                                </div>

                                <div class="filter-item">
                                    <h3>Prix</h3>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" name="price"
                                                                   value="<=300" onchange="redirectToPage()"><label class="form-check-label" @if($price == "<=300") style="color: green; font-weight: bold" @endif> <= 300 MAD</label>
                                    </div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" name="price"
                                                                   value="<=1000" onchange="redirectToPage()"><label class="form-check-label" @if($price == "<=1000") style="color: green; font-weight: bold" @endif> <= 1000 MAD </label>
                                    </div>
                                </div>
                                <div class="filter-item">
                                    <a href="{{route("allAds")}}" class="link-info">Rénitialiser filtre</a>
                                </div>
                            </div>
                        </div>
                        <div class="d-md-none"><a class="btn btn-link d-md-none filter-collapse"
                                                  data-bs-toggle="collapse" aria-expanded="false"
                                                  aria-controls="filters" href="#filters" role="button">Filters<i
                                    class="icon-arrow-down filter-caret"></i></a>
                            <div class="collapse" id="filters">
                                <div class="filters">
                                    <div class="filter-item">
                                        <h3>Categories</h3>
                                        <div class="form-check"><input class="form-check-input" type="checkbox"
                                                                       id="formCheck-1"><label class="form-check-label"
                                                                                               for="formCheck-1">Phones</label>
                                        </div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox"
                                                                       id="formCheck-2"><label class="form-check-label"
                                                                                               for="formCheck-2">Laptops</label>
                                        </div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox"
                                                                       id="formCheck-3"><label class="form-check-label"
                                                                                               for="formCheck-3">PC</label>
                                        </div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox"
                                                                       id="formCheck-4"><label class="form-check-label"
                                                                                               for="formCheck-4">Tablets</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">

                        <div class="box">
                            <form name="search">
                                <input type="text" id="search-input"  class="input" name="txt" onmouseout="this.value = ''; this.blur();">
                                <i class="fas fa-search"></i>
                            </form>



                        </div>
                        <div id="products" class="products">
                            <div class="row g-0">
                                @foreach($all_ads as $ad)
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="clean-product-item">
                                            <div class="image"><a href="{{route("showAd",["ad_id" => $ad->ad_id])}}"><img class="img-fluid d-block mx-auto"
                                                                                src="{{asset("storage/".$ad_images[$ad->ad_id])}}"></a>
                                            </div>
                                            <div class="product-name"><a href="{{route("showAd",["ad_id" => $ad->ad_id])}}">{{$ad->title}}</a></div>
                                            <div class="about">
                                                <div class="rating"><img src="{{asset("assets/img/star.svg")}}">
                                                    <img src="{{asset("assets/img/star.svg")}}">
                                                    <img src="{{asset("assets/img/star.svg")}}">
                                                    <img src="{{asset("assets/img/star.svg")}}">
                                                    <img src="{{asset("assets/img/star.svg")}}">
                                                </div>
                                                <div class="price">
                                                    <h3>{{$ad->price}} MAD</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                    <div id="#search_list">

                                    </div>
                            </div>
                            <nav>
                                <ul class="pagination">
                                    <li class="page-item disabled"><a class="page-link" aria-label="Previous"><span
                                                aria-hidden="true">«</span></a></li>
                                    <li class="page-item active"><a class="page-link">1</a></li>
                                    <li class="page-item"><a class="page-link">2</a></li>
                                    <li class="page-item"><a class="page-link">3</a></li>
                                    <li class="page-item"><a class="page-link" aria-label="Next"><span
                                                aria-hidden="true">»</span></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(function( $ ){
        $('#search-input').on('keyup', function() {
            // Code à exécuter lors de l'événement keyup
            console.log('dd');
            $value = $(this).val();
            $.ajax({

                type: 'GET',
                url: '{{URL::to('search')}}',
                data: {'search':$value},
                success: function(data) {
                    console.log(data)
                    $('#products').html(data);
                },
                error:function (xhr){
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>

<script >

     function redirectToPage() {
         // get all the checkboxes
         const categoriesCheckboxes = document.querySelectorAll('input[name="categorie"]');
         const citiesCheckboxes = document.querySelectorAll('input[name="city"]');
         const priceCheckboxes = document.querySelectorAll('input[name="price"]');




         // initialize an empty array to store the selected checkboxes
         const categoriesSelectedCheckboxes = [];
         const citiesSelectedCheckboxes = [];
         const priceSelectedCheckboxes = [];



         // loop through the checkboxes and check if they are checked
         categoriesCheckboxes.forEach(checkbox => {
             if (checkbox.checked) {
                 // if checked, add the checkbox to the selectedCheckboxes array
                 categoriesSelectedCheckboxes.push(checkbox.value);
             }
         });
         citiesCheckboxes.forEach(checkbox => {
             if (checkbox.checked) {
                 // if checked, add the checkbox to the selectedCheckboxes array
                 citiesSelectedCheckboxes.push(checkbox.value);
             }
         });

         priceCheckboxes.forEach(checkbox => {
             if (checkbox.checked) {
                 // if checked, add the checkbox to the selectedCheckboxes array
                 priceSelectedCheckboxes.push(checkbox.value);
             }
         });

         // if any checkbox is selected, redirect to the desired page
         if (categoriesSelectedCheckboxes.length > 0 || citiesSelectedCheckboxes.length > 0 || priceSelectedCheckboxes.length > 0) {
             if(categoriesSelectedCheckboxes.length == 0) categoriesSelectedCheckboxes.push("null");
             if(citiesSelectedCheckboxes.length == 0) citiesSelectedCheckboxes.push("null")
             if(priceSelectedCheckboxes.length == 0) priceSelectedCheckboxes.push("null")
             const categoriesSelectedCheckboxesValue = categoriesSelectedCheckboxes.join(",");
             const citiesSelectedCheckboxesValue = citiesSelectedCheckboxes.join(",");
             const priceSelectedCheckboxesValue = priceSelectedCheckboxes.join(",");
             window.location.href = "/all-ads/" + categoriesSelectedCheckboxesValue + "/" +
                 citiesSelectedCheckboxesValue + "/" + priceSelectedCheckboxesValue;
         }
         else{
             window.location.href = "/all-ads";
         }
     }
 </script>
