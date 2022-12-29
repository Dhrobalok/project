


 
 @extends('backend.admin.index')
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css"/>
 <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
 
 
@section('content')

<style>
  #button
{
  border: none;
  outline:none;
}

 .editable-click, a.editable-click, a.editable-click:hover {
  text-decoration: none !important;
  text-decoration-line: none !important;
  text-decoration-thickness: initial;
  text-decoration-style: initial;
  text-decoration-color: initial;
  border-bottom: none !important;
} 
</style>
  <div class="container">
    
    
      <div class="card">
        
          <div class="card-header text-center p-4"> 
            
            <h4 class="text-center p-0 m-0" style="color:blueviolet;display: inline-block;">{{ $deptname }}</h4>
            
            
            <a href="{{ url('download.office',$officeid) }}" style="display: inline-block;float:right;"><button class="btn btn-md btn-alt-primary"><i class="fa fa-download" style="font-size:15px">&nbsp;<span>Download</span></i></button></a>
            

            
            
          </div>
          <div class="card-body p-3">
            
           
           <div class="table-responsive">

            
              <table id="table" class="table table-bordered data-table p-2">
                  <thead class="bg-light">
                      <tr class="table-active">
                        <th></th>
                       
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Seniority&nbsp;Index</th>
                        <th>Office&nbsp;Address</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>
                          <div class="dropdown">
                            <button  id="button" class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Status
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ url('show.office',$officeid) }}">Active</a>
                                <a class="dropdown-item" href="{{ url('view.Inactiove',$officeid) }}">Inactive</a>
                            </div>
                        </div>
                        </th>
                        
                      </tr>
                  </thead>
                  <tbody id="tablecontents" >
                      @foreach($profileinform as $product)
                           <tr  class="row1"  data-id="{{ $product->id }}">
                            {{-- <td>{{ $product->dbuid }}</td>  --}}
                            {{-- <td>{{ $product->id }}</td>  --}}
                            <td class="pl-3"><i class="fa fa-sort"></i></td> 
                              
                              <td>
                                {{ $product->fullNameNew }}
                                <input type="hidden" name="index[]" value="{{ $product->id }}">
                              </td>
                              <td>
                                  <p  class="update" data-name="designation" data-type="text" data-pk="{{ $product->id }}" data-title="Enter Detail">{{ $product->Designation }}</p>
                              </td>

                              <td data-sid="{{$product->officeSRINDEX}}">
                                <p  class="update" data-name="index" data-type="text" data-pk="{{ $product->id }}"  data-title="Enter Name">{{ $product->officeSRINDEX }}</p>
                            </td>
                            <td>
                                <p  style="line-height: 1.2;" class="update" data-name="adress" data-type="text" data-pk="{{ $product->id }}" data-title="Enter Detail">{{ $product->office_address }}</p>
                            </td>

                            <td>
                              <p  class="update" data-name="email" data-type="text" data-pk="{{ $product->id }}" data-title="Enter name">{{ $product->emaill }}</p>
                          </td>
                          <td>
                              <p  class="update" data-name="mobile" data-type="text" data-pk="{{ $product->id }}" data-title="Enter Detail">{{ $product->mobile_no }}</p>
                          </td>
                          <td>
                            <p  class="update" data-name="jobstatus" data-type="text" data-pk="{{ $product->id }}" data-title="Enter Detail">{{ $product->job_status }}</p>
                          </td>
                              
                          </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>
        </div>
      
      </div>
  </div>
  
  <script type="text/javascript">

    $.fn.editable.defaults.mode = 'inline';

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    });

    $('.update').editable({
        url: "{{ route('update.data') }}",
        type: 'text',
        pk: 1,
        name: 'name',
        title: 'Enter name'
    });

    $(".deleteProduct").click(function(){
      $(this).parents('tr').hide();
        var id = $(this).data("id");
        var token = '{{ csrf_token() }}';
        $.ajax(
        {
            method:'POST',
            url: "product/delete/"+id,
            data: {_token: token},
            success: function(data)
            {
                toastr.success('Successfully!','Delete');
            }
        });
    });
</script>

@endsection

 @push('js')


 <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
 <script type="text/javascript">
   $(function () {
      $("#table").DataTable();
       
      $( "#tablecontents" ).sortable({
       
       
        items: "tr",
        cursor: 'move',
        opacity: 0.6,
        update: function() {
            sendOrderToServer();
        }
      });
       
     
      function sendOrderToServer() {
        
        var order = [];
        var token = $('meta[name="csrf-token"]').attr('content');
        $('tr.row1').each(function(index,element) {
          
          order.push({
            id: $(this).attr('data-id'),
            position: index+1,
          });
         
        });

        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
           });
       
        $.ajax({
          
          type: "POST", 
          dataType: "json", 
          url: "{{ route('postsortable') }}",

           data: {
            order: order,
            token: token,
          },
        
          success: function(response) {
            
              if (response.status == "success") 
              {
                
                console.log(response);
              } 
              else 
              {
                
                console.log(response);
              }
          }
        });

        
      }
    
    });
  </script> 




   
 @endpush

  
