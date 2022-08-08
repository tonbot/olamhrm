<div class="card mt-5 shadow">
    <!-- card for Assigned Supervisors -->
    <div class="card-header">
        <h6 class="changeTitle">Skill</h6>
    </div>
    <div class="card-body ">
        <button class="btn btn-success addSkill">Add</button>
        <div class="contact_formSkill">
            <div class="row">
                <div class="col-2">
                    <span> Skill <em>*</em> </span>
                </div>
                <div class="col-10">
                    <div class="second-row">
                        <input type="text" id="skill">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <span>Years of Experience</span>
                </div>
                <div class="col-10">
                    <div class="second-row">
                        <input type="text" id="years_of_experience">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <span>Comments</span>
                </div>
                <div class="col-10">
                    <div class="second-row">
                        <textarea id="skillComment" name="" rows="4" cols="35">
                                        </textarea>
                    </div>
                </div>
            </div>
            <hr />
            <div>
                <button class="btn btn-success saveSkill">Save</button>
                <button class="btn btn-secondary cancelSkill">Cancel</button>
            </div>
        </div><!-- contact_form ends here -->
        <div class="table-container">
            <!-- record list container start here-->
            <table class=" mt-2 table table-bordered table-center  table-striped table-hover" id="skillTable">
                <thead>
                    <tr>
                        <th></th>
                        <th>Skill</th>
                        <th>years of Experience of</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div><!-- record list container ends here-->
    </div> <!-- card-body ends here -->
</div><!-- card for Assigned Supervisors -->