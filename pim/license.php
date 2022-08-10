<div class="card mt-5 shadow">
    <!-- card for Assigned Supervisors -->
    <div class="card-header">
        <h6 class="changeTitle">Add License</h6>
    </div>
    <div class="card-body ">
        <button class="btn btn-success addLicense">Add</button>
        <div class="contact_formLicense">
            <div class="row">
                <div class="col-2">
                    <span> License Type <em>*</em> </span>
                </div>
                <div class="col-10">
                    <div class="second-row">
                        <input type="text" id="licenseType">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <span>License Number</span>
                </div>
                <div class="col-10">
                    <div class="second-row">
                         <input type="text" id="licenseNumber">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <span>Issued Date</span>
                </div>
                <div class="col-10">
                    <div class="second-row">
                         <input class= "datepickers" type="text" id="issuedDate">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <span>Expiry Date</span>
                </div>
                <div class="col-10">
                    <div class="second-row">
                         <input class= "datepickers" type="text" id="expiryDate">
                    </div>
                </div>
            </div>
            <hr />
            <div>
                <button class="btn btn-success saveLicense">Save</button>
                <button class="btn btn-secondary cancelLicense">Cancel</button>
            </div>
        </div><!-- contact_form ends here -->
        <div class="table-container">
            <!-- record list container start here-->
            <table class=" mt-2 table table-bordered table-center  table-striped table-hover" id="licenseTable">
                <thead>
                    <tr>
                        <th></th>
                        <th>License Type</th>
                        <th>License Number</th>
                        <th>Issued Date</th>
                        <th>Expiry Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div><!-- record list container ends here-->
    </div> <!-- card-body ends here -->
</div><!-- card for Assigned Supervisors -->