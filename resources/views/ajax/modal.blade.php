
<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <form action="{{ URL::to('ajax/store/') }}" method="POST"  id="form-insert">
      <div class="modal-body">
        <div class="col-4-md">
          <div class="groupe-form">

            <label >User Name</label>
            <input name="name"  type="text" class="form-control">
          </div>
        </div>
          <div class="col-4-md">
          <div class="groupe-form">

            <label >E-Mail</label>
            <input name="email"  type="text" class="form-control">
          </div>
          </div>
          <div class="col-4-md">
          <div class="groupe-form">

            <label >Password</label>
            <input name="password"  type="text" class="form-control">
     
          </div>

        </div>
      </div>
      

      <!-- Modal footer -->
      <div class="modal-footer">
        <input type="submit" class="btn btn-success pull-left" value="Save">
        
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      </form>

    </div>
  </div>
</div>

