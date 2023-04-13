@php
if(!isset($cat_ids)) $cat_ids = "";
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
                                        <div class="form-check"><input class="form-check-input" type="checkbox"
                                                                       id="formCheck-{{$cat->category_id}}" value="{{$cat->category_id}}" onchange="redirectToPage()"  @php if(strstr($cat_ids,$cat->category_id)) echo "checked" @endphp><label class="form-check-label"
                                                                                                                                                                                           for="formCheck-{{$cat->category_id}}">{{$cat->name}}</label>
                                        </div>
                                    @endforeach
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
                        <div class="products">
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
 <script>
     function redirectToPage() {
         console.log("hahahahahaha");
         // get all the checkboxes
         const checkboxes = document.querySelectorAll('input[type="checkbox"]');

         // initialize an empty array to store the selected checkboxes
         const selectedCheckboxes = [];

         // loop through the checkboxes and check if they are checked
         checkboxes.forEach(checkbox => {
             if (checkbox.checked) {
                 // if checked, add the checkbox to the selectedCheckboxes array
                 selectedCheckboxes.push(checkbox.value);
             }
         });

         // if any checkbox is selected, redirect to the desired page
         if (selectedCheckboxes.length > 0) {
             console.log("pppp")
             const selectedCheckboxesValue = selectedCheckboxes.join(",");
             window.location.href = "/all-ads/" + selectedCheckboxesValue;
         }
         else{
             window.location.href = "/all-ads";
         }
     }
 </script>
