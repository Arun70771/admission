@extends('admin.layouts.main')
@section('content')
<!-- partial -->

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">Virtual Campus Course Report</h4>
                </div>
            </div>
            <div class="col-12 my-2">
                <div class="row">
                    <div class="col-md-4">
                        <form action="https://admissions.sau.ac.in/admin/reports/virtual-compus" method="GET">
                            <label for="searchInput" class="form-label">Search</label>
                            <div class="form-group d-flex" style="gap: 10px;">
                                <input type="text" class="form-control" id="searchInput" name="search" value="" placeholder="Search by name, email, or mobile">
                                <button type="submit" class="btn btn-primary btn-sm">Search</button>
                            </div>
                        </form>
                    </div>

                    <!-- Payment Status Filter -->
                    <div class="col-md-2">
                        <form method="GET" action="https://admissions.sau.ac.in/admin/reports/virtual-compus">
                            <div class="form-group">
                                <label for="paymentStatusSelect">Payment Status</label>
                                <select class="form-control mt-2" id="paymentStatusSelect" name="payment_status" onchange="this.form.submit()">
                                    <option value="">Select Status</option>
                                    <option value="1" >Completed</option>
                                    <option value="0" >In Progress</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    
                    <div class="col-md-3">
                        <label for="dateRange" class="form-label">Date Range</label>
                        <div class="form-group row">
                        <div class="col-md-6">
                            <input type="date" class="form-control" id="startDate" placeholder="Start Date">
                        </div>
                        <div class="col-md-6">
                            <input type="date" class="form-control" id="endDate" placeholder="End Date">
                        </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                    <div class="d-flex justify-content-end" style="margin-top: 1.8rem;">
                        <button class="btn btn-primary btn-sm" id="applyFilters">Apply Filters</button>
                        <div class="dropdown ml-3 toolbar-item">
                        <button class="btn btn-success dropdown-toggle" type="button" id="dropdownexport" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Export</button>
                        <div class="dropdown-menu" aria-labelledby="dropdownexport">
                            <a class="dropdown-item" href="#" onclick="exportToExcel()">Export as Excel</a>
                            <!-- <a class="dropdown-item" href="#">Export as DOCX</a>
                            <a class="dropdown-item" href="#">Export as CDR</a> -->
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
                      
                    
                    
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">BBA (Hons)</h4>

                            <!-- Enrolled Students Section -->
                            <div class="enrollment-info">
                                <table class="table table-bordered text-center course-table" data-course-name="BBA (Hons)">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Registration No.</th>
                                            <th>Student Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Country</th>
                                            <th>Registration Status</th>
                                            <th>View Details</th>
                                        </tr>
                                    </thead>
                                    <tbody id="student-list">
                                                                                    <tr>
                                                <td>1</td>
                                                <td>D101914</td>
                                                <td>AGAM KUMAR</td>
                                                <td>docneeraj239@gmail.com</td>
                                                <td>09810569095</td>
                                                <td>India</td>
                                                <td class="text-success">
                                                    Completed
                                                </td>
                                                <td>
                                                    <a href="https://admissions.sau.ac.in/admin/reports/applicant/1914" class="btn btn-primary">View</a>
                                                </td>
                                            </tr>
                                                                                    <tr>
                                                <td>2</td>
                                                <td>D101314</td>
                                                <td>HARDIK KUMAR</td>
                                                <td>hardik00000002@gmail.com</td>
                                                <td>8979742061</td>
                                                <td>India</td>
                                                <td class="text-danger">
                                                    In Progress
                                                </td>
                                                <td>
                                                    <a href="https://admissions.sau.ac.in/admin/reports/applicant/1314" class="btn btn-primary">View</a>
                                                </td>
                                            </tr>
                                                                                    <tr>
                                                <td>3</td>
                                                <td>D102683</td>
                                                <td>Mohammad Mirhazar</td>
                                                <td>MohMirhazar@gmail.com</td>
                                                <td>0766346735</td>
                                                <td>Afghanistan</td>
                                                <td class="text-danger">
                                                    In Progress
                                                </td>
                                                <td>
                                                    <a href="https://admissions.sau.ac.in/admin/reports/applicant/2683" class="btn btn-primary">View</a>
                                                </td>
                                            </tr>
                                                                            </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                        
    </div>
</div>

<script>
    function exportToExcel() {
        let wb = XLSX.utils.book_new(); // Create a new workbook
        let allData = [];
        let tables = document.querySelectorAll(".course-table"); // Select all course tables

        if (tables.length === 0) {
            alert("No data available to export.");
            return;
        }

        tables.forEach((table) => {
            let courseName = table.getAttribute("data-course-name") || "Unknown Course";
            let ws = XLSX.utils.table_to_sheet(table);
            let jsonSheet = XLSX.utils.sheet_to_json(ws, { header: 1 });

            jsonSheet = jsonSheet.map(row => row.slice(0, 7));

            allData.push([`Course: ${courseName}`]); // Add course name as a row
            allData.push(jsonSheet[0]); // Add column headers for each course
            allData.push(...jsonSheet.slice(1)); // Add course data
            allData.push([]); // Empty row for separation
        });

        let finalWs = XLSX.utils.aoa_to_sheet(allData);
        XLSX.utils.book_append_sheet(wb, finalWs, "All Courses Data");
        XLSX.writeFile(wb, "virtual_Campus_Data.xlsx");
    }
</script>
<!-- partial:admin/partials/_footer.html -->

@endsection