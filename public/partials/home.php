
	<div class="container">
  	<div ng-controller="ProductsCtrl">
			<ul class="list-group">
			  <li ng-repeat="product in products" class="list-group-item">{{ product.title }}</li>
			</ul>
		</div>
	</div>

