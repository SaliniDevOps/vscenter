
      <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar bg-dark">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item" style="background-color:red;">
        <a class="nav-link " href="../DashBoard/FormUI.php" style="background-color: #e6e6e6;">
          <i class="bi bi-grid"></i>
          <span >Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
		<br>
      <li class="nav-item" style="background-color:#262626;">
        <a class="nav-link collapsed " data-bs-target="#components-nav" data-bs-toggle="collapse" href="#" style="background-color: #e6e6e6;">
          <i class="bi bi-menu-button-wide" ></i><span >Work Orders</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="../AdminViewAppoinments/FormUI.php" class="text-white"> <!--class="text-white"-->
              <i class="bi bi-circle"></i><span>View Appoinments</span>
            </a>
			<!--a href="../AdminCreateWorkOrder/FormUI.php" class="text-white">
              <i class="bi bi-circle"></i><span>Manage Work Orders</span>
            </a-->
			<a href="../AdminAssignWorks/FormUI.php" class="text-white">
              <i class="bi bi-circle"></i><span>Assign Order to Technicians</span> 
            </a>
			
          </li>
         
        </ul>
      </li><!-- End Components Nav -->

		<br>
		<li class="nav-item" >
        <a class="nav-link collapsed" href="../AdminInvoice/FormUI.php" style="background-color: #e6e6e6;">
          <i class="bi bi-journal-text"></i>
          <span>Invoices</span>
        </a>
      </li><!-- End Profile Page Nav -->
	  
      <br>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#" style="background-color: #e6e6e6;">
          <i class="bi bi-layout-text-window-reverse"></i><span>Inventory</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav"  >
		
		<li >
            <a href="../AdminAddSupliers/FormUI.php" class="text-white">
              <i class="bi bi-circle"></i><span>Add Suppliers</span>
            </a>
          </li>
          <li>
            <a href="../AdminViewStock/FormUI.php" class="text-white">
              <i class="bi bi-circle"></i><span>View Stock</span>
            </a>
          </li>
		  <li>
            <a href="../AdminOrderStock/FormUI.php" class="text-white">
              <i class="bi bi-circle"></i><span>Order Stock </span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->
	  <br>
	  
		<li class="nav-heading">Add Data</li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#" style="background-color: #e6e6e6;">
          <i class="bi bi-bar-chart"></i><span>Spare</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
			<li >
			<a href="../AdminAddServiceType/AddServiceTypeUI.php" class="text-white">
              <i class="bi bi-circle"></i><span>Add Service Types</span>
            </a>
		</li >
			<!--li>
				<a href="../AdminAddSpareTypesModel/FormUI.php" class="text-white">
				  <i class="bi bi-circle"></i><span>Model Types</span>
				</a>
			</li-->
			<li>
				<a href="../AdminAddSpareTypes/FormUI.php" class="text-white">
				  <i class="bi bi-circle"></i><span>Spare Item</span>
				</a>
			</li>
          
        </ul>
      </li><!-- End Charts Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#" style="background-color: #e6e6e6;">
          <i class="bi bi-gem"></i><span>Vehicles</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="../AdminVehicleTypes/FormUI.php" class="text-white">
              <i class="bi bi-circle"></i><span>Vehicle </span>
            </a>
          </li>
          <li>
            <a href="../AdminVehicleModels/FormUI.php" class="text-white">
              <i class="bi bi-circle"></i><span>Vehicle Models </span>
            </a>
          </li>
          <li>
            <a href="../AdminFuelTypes/FormUI.php"" class="text-white">
              <i class="bi bi-circle"></i><span>Fuel Type</span>
            </a>
          </li>
        </ul>
      </li><!-- End Icons Nav -->

      

      <li class="nav-item">
        <a class="nav-link collapsed" href="../AdminAddTechnicians/FormUI.php" style="background-color: #e6e6e6;">
          <i class="bi bi-person"></i>
          <span>Technicians</span>
        </a>
      </li><!-- End Profile Page Nav -->

		
      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-blank.html" style="background-color: #e6e6e6;">
          <i class="bi bi-file-earmark"></i>
          <span>Reports</span>
        </a>
      </li><!-- End Blank Page Nav -->
	  
	  

	<!--li class="nav-item">
        <a class="nav-link collapsed" href="../CustomerAppoinments/FormUI.php">
          <i class="bi bi-person"></i>
          <span>Customer Appoinments</span>
        </a>
      </li--><!-- End Profile Page Nav -->

    </ul>
	
	
	

  </aside><!-- End Sidebar-->

