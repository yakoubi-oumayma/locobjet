@extends("layouts.master")

@section("contenu")

     

      <h2>Reservations</h2>
    
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            
            <tr>
              
              <th scope="col">start_date</th>
              <th scope="col">end_date</th>
              <th scope="col">state</th>
              <th scope="col">annonce</th>
              <th scope="col">utilisateurs</th>
              
              
            </tr>
          </thead>
          <tbody>
          @foreach ($reservations as $reservation)
            <tr>
              <td>{{$reservation->start_date}}</td>
              <td>{{$reservation->end_date}}</td>
              <td>{{$reservation->state}}</td>
              <td>{{$reservation->Annonces->title}}</td>
              <td>{{$reservation->utilisateurs->username}}</td>
             
              <td>
               

                
               
              </td>
            </tr>
            @endforeach
           
           
           
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>

@endsection