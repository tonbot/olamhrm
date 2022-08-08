<div class="card mt-5 shadow">
    <!-- card for Assigned Supervisors -->
    <div class="card-header">
        <h6 class="changeTitle">Education</h6>
    </div>
    <div class="card-body ">
        <button class="btn btn-success addEducation">Add</button>
        <div class="contact_formEducation">
            <div class="row">
                <div class="col-2">
                    <span> level <em>*</em> </span>
                </div>
                <div class="col-10">
                    <div class="second-row">
                        <input type="text" id="level">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <span>Institute</span>
                </div>
                <div class="col-10">
                    <div class="second-row">
                        <input type="text" id="institute">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <span>Major/Specialization</span>
                </div>
                <div class="col-10">
                    <div class="second-row">
                        <input type="text" id="major">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <span>Year</span>
                </div>
                <div class="col-10">
                    <div class="second-row">
                        <input type="text" id="year">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <span>GPA/Score</span>
                </div>
                <div class="col-10">
                    <div class="second-row">
                        <input type="text" id="score">
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-2">
                    <span> Start Date </span>
                </div>
                <div class="col-10">
                    <div class="second-row">
                        <input type="text" id="startDate" class="datepickers" placeholder = "yyyy-mm-dd"><i class="fa fa-calendar pl-1 text-secondary" ></i>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <span> End Date  </span>
                </div>
                <div class="col-10">
                    <div class="second-row">
                        <input type="text" id="endDate"  class="datepickers" placeholder = "yyyy-mm-dd"><i class="fa fa-calendar pl-1 text-secondary" ></i>
                    </div>
                </div>
            </div>
            <hr />
            <div>
                <button class="btn btn-success saveEducation">Save</button>
                <button class="btn btn-secondary cancelEducation">Cancel</button>
            </div>
        </div><!-- contact_form ends here -->
        <div class="table-container">
            <!-- record list container start here-->
            <table class="table table-bordered table-center  table-striped table-hover" id="educationTable">
                <thead>
                    <tr>
                        <th></th>
                        <th>Level</th>
                        <th>Year</th>
                        <th>Score</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
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