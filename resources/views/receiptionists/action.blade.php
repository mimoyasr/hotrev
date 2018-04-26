<a href='receiptionists/{{$id}}/edit' class='btn btn-xs btn-primary'><i class='glyphicon glyphicon-edit'></i> Edit</a>
<button type='button' target="{{$id}}"  class='delete btn-xs btn btn-danger' > DELETE </button> 

     
        
        
         @if($flagBan)
         <a href="/receiptionists/{{$user_id}}/banning" class="btn btn-xm btn-primary" >Unban</a>

         @else
         <a href="/receiptionists/{{$user_id}}/banning" class="btn btn-xm btn-danger" >Ban</a>  
         @endif    
  
        
