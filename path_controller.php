<?php
class PathController
{
    public $paths_view = array("my_profile,upcomming_feature");

    public function
    default()
    {
        array_push($this->paths_view, "settings", 'our_team');
    }
    public function controlPanel()
    {
        echo '<a class="list-item dash-button" href="?page=control%2Fadmin_control">' .
            '<div class=" toggle-side-bar"><i class="fa fa-users"></i></div>' .
            '<p>User Control</p>' .
            '</a>';

        array_push($this->paths_view, 'control/admin_control', 'control/staff_role_management');
    }
    function student_dashboard()
    {
        echo '<a class="list-item dash-button" href="?page=student_dashboard">' .
            '   <div class=" toggle-side-bar"><i class="fa fa-dashboard"></i></div>' .
            '   <p>Dashboard</p>' .
            '</a>';

        array_push($this->paths_view, 'student_dashboard');
    }

    function student_admission()
    {
        echo '<div class="list-content">' .
            '    <a class="list-item" data-target="#admission" data-toggle="collapse">' .
            '        <div class="toggle-side-bar"><i class="fa fa-user-plus  "></i></div>' .
            '        <div class="side-dropdown">' .
            '            <p>Admission</p>' .
            '            <i class="fa fa-caret-down"></i>' .
            '        </div>' .
            '    </a>' .
            '    <div id="admission" class="fade collapse" data-parent="#student-accordion">' .
            '        <a class="list-item" href="?page=admission%2Fadmission_form">' .
            '            <div class="toggle-side-bar"><i class="fa fa-id-card-o"></i></div>' .
            '            <p>Admission Form</p>' .
            '        </a>' .
            '        <a class="list-item" href="?page=admission%2Fupload_documents">' .
            '            <div class="toggle-side-bar"><i class="fa fa-upload"></i></div>' .
            '            <p>Upload Documents</p>' .
            '        </a>' .
            '        <a class="list-item" href="?page=course_enrollment.view">' .
            '            <div class="toggle-side-bar"><i class="fa fa-list-ul"></i></div>' .
            '            <p>Course Enrollment</p>' .
            '        </a>' .
            '        <a class="list-item" href="?page=payment.view">' .
            '            <div class="toggle-side-bar"><i class="fa fa-rupee"></i></div>' .
            '            <p>Payment</p>' .
            '        </a>' .
            '        <a class="list-item" href="?page=scholarship.view">' .
            '            <div class="toggle-side-bar"><i class="fa fa-dot"></i></div>' .
            '            <p>Scholarship</p>' .
            '        </a>' .
            '    </div>' .
            '</div>';

        array_push($this->paths_view, 'admission/admission_form', 'admission/upload_documents', 'course_enrollment.view', 'payment.view');
    }

    function student_academics()
    {
        echo '<div class="list-content">' .
            '    <a class="list-item" data-target="#academics" data-toggle="collapse">' .
            '        <div class="toggle-side-bar"><i class="fa fa-graduation-cap  "></i></div>' .
            '        <div class="side-dropdown">' .
            '            <p>Academics</p>' .
            '            <i class="fa fa-caret-down"></i>' .
            '        </div>' .
            '    </a>' .
            '    <div id="academics" class="fade collapse" data-parent="#student-accordion">' .
            '        <a class="list-item" href="#">' .
            '            <div class="toggle-side-bar"><i class="fa fa-address-book-o"></i></div>' .
            '            <p>Class Advisor</p>' .
            '        </a>' .
            '        <a class="list-item" href="#">' .
            '            <div class="toggle-side-bar"><i class="fa fa-book"></i></div>' .
            '            <p>Co – Curricular Activities</p>' .
            '        </a>' .
            '        <a class="list-item" href="#">' .
            '            <div class="toggle-side-bar"><i class="fa fa-trophy"></i></div>' .
            '            <p>Extra – Curricular Activities</p>' .
            '        </a>' .
            '        <a class="list-item" href="#">' .
            '            <div class="toggle-side-bar"><i class="fa fa-building-o"></i></div>' .
            '            <p>Placement Activities</p>' .
            '        </a>' .
            '    </div>' .
            '</div>';
    }

    function student_department()
    {
        echo '<div class="list-content">' .
            '    <a class="list-item" data-target="#department" data-toggle="collapse">' .
            '        <div class="toggle-side-bar"><i class="fa fa-institution"></i></div>' .
            '        <div class="side-dropdown">' .
            '            <p>Department</p>' .
            '            <i class="fa fa-caret-down"></i>' .
            '        </div>' .
            '    </a>' .
            '    <div id="department" class="fade collapse" data-parent="#student-accordion">' .
            '        <a class="list-item" href="#">' .
            '            <div class="toggle-side-bar"><i class="fa fa-calendar"></i></div>' .
            '            <p>Time Table</p>' .
            '        </a>' .
            '        <a class="list-item" href="#">' .
            '            <div class="toggle-side-bar"><i class="fa fa-bell-o"></i></div>' .
            '            <p>Notices</p>' .
            '        </a>' .
            '        <a class="list-item" href="#">' .
            '            <div class="toggle-side-bar"><i class="fa fa-envelope-o"></i></div>' .
            '            <p>Write Application</p>' .
            '        </a>' .
            '        <a class="list-item" href="#">' .
            '            <div class="toggle-side-bar"><i class="fa fa-file-text-o"></i></div>' .
            '            <p>Concession Form</p>' .
            '        </a>' .
            '    </div>' .
            '</div>';
    }

    function student_examination()
    {
        echo '<div class="list-content">' .
            '    <a class="list-item" data-target="#examination" data-toggle="collapse">' .
            '        <div class="toggle-side-bar"><i class="fa fa-bar-chart  "></i></div>' .
            '        <div class="side-dropdown">' .
            '            <p>Examination</p>' .
            '            <i class="fa fa-caret-down"></i>' .
            '        </div>' .
            '    </a>' .
            '    <div id="examination" class="fade collapse" data-parent="#student-accordion">' .
            '        <a class="list-item" href="#">' .
            '            <div class="toggle-side-bar"><i class="fa fa-list-ul"></i></div>' .
            '            <p>Enrollment</p>' .
            '        </a>' .
            '        <a class="list-item" href="#">' .
            '            <div class="toggle-side-bar"><i class="fa fa-rupee"></i></div>' .
            '            <p>Fees</p>' .
            '        </a>' .
            '        <a class="list-item" href="#">' .
            '            <div class="toggle-side-bar"><i class="fa fa-address-card-o"></i></div>' .
            '            <p>Hall Ticket</p>' .
            '        </a>' .
            '        <a class="list-item" href="#">' .
            '            <div class="toggle-side-bar"><i class="fa fa-check-square-o"></i></div>' .
            '            <p>Semester Result</p>' .
            '        </a>' .
            '        <a class="list-item" href="#">' .
            '            <div class="toggle-side-bar"><i class="fa fa-repeat"></i></div>' .
            '            <p>Revaluation Form</p>' .
            '        </a>' .
            '    </div>' .
            '</div>';
    }
    function student_section()
    {
        echo '<div class="list-content">' .
            '    <a class="list-item" data-target="#student_section" data-toggle="collapse">' .
            '        <div class="toggle-side-bar"><i class="fa fa-dot-circle-o"></i></div>' .
            '        <div class="side-dropdown">' .
            '            <p>Student Section</p>' .
            '            <i class="fa fa-caret-down"></i>' .
            '        </div>' .
            '    </a>' .
            '    <div id="student_section" class="collapse" data-parent="#student-accordion">' .
            '        <a class="list-item" href="?page=student_section%2Fadmission%2Fadmission_forms">' .
            '            <div class="toggle-side-bar"><i class="fa fa-circle-o"></i></div>' .
            '            <p>Admission Forms</p>' .
            '        </a>' .
            '        <a class="list-item" href="?page=student_section%2Fstudent_data_register">' .
            '            <div class="toggle-side-bar"><i class="fa fa-circle-o"></i></div>' .
            '            <p>Student Data Register</p>' .
            '        </a>' .
            '        <a class="list-item" href="javascipt:void(0)">' .
            '            <div class="toggle-side-bar"><i class="fa fa-circle-o"></i></div>' .
            '            <p>Issue Bonafite</p>' .
            '        </a>' .
            '        <a class="list-item" href="javascipt:void(0)">' .
            '            <div class="toggle-side-bar"><i class="fa fa-circle-o"></i></div>' .
            '            <p>Department Transfer</p>' .
            '        </a>' .
            '        <a class="list-item" href="javascipt:void(0)">' .
            '            <div class="toggle-side-bar"><i class="fa fa-circle-o"></i></div>' .
            '            <p>Leaving Certificate</p>' .
            '        </a>' .
            '    </div>' .
            '</div>';

        array_push($this->paths_view, 'student_section/admission/admission_forms', 'student_section/admission_form_review', 'student_section/student_data_register');
    }
}
