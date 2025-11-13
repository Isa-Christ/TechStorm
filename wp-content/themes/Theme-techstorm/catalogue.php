<?php
/**
*Template pour le catalogue
*/
get_header();
?>

<main>
  <section class="catalogue" aria-label="Catalogue de produits">
    <!-- barre laterale de filtres -->
    <aside class="filters" aria-labelledby="filters-title">
      <h3 id="filters-title">Filtres</h3>
      
      <!-- Barre de recherche -->
      <div class="filter-group">
            <label for="search" class="visually-hidden">Rechercher</label>
            <input id="search" type="search" placeholder="Rechercher un produit, ex: Airpods" />
      </div>
      
      <!-- Filtres par categories -->
      <div class="filter-group">
	    <h4>Catégories</h4>
	    <ul class="filter-list" id="category-filters">
	      <li><label><input type="checkbox" value="Smartphones" /> <span>Smartphones</span></label></li>
	      <li><label><input type="checkbox" value="Laptops" /> <span>Laptops</span></label></li>
	      <li><label><input type="checkbox" value="Montres" /> <span>Montres</span></label></li>
	      <li><label><input type="checkbox" value="Écouteurs" /> <span>Écouteurs</span></label></li>
	      <li><label><input type="checkbox" value="Accessoires" /> <span>Accessoires</span></label></li>
	    </ul>
      </div>

      <!-- Filtres par prix -->
      <div class="filter-group">
	    <h4>Prix</h4>
	    <div class="price-range">
	      <input type="range" id="price-range" min="0" max="300000" step="1000" value="300000" />
	      <div class="price-value">Max : <span id="price-max">300&nbsp;000</span> FCFA</div>
	    </div>
      </div>

      <div class="filter-actions">
	    <button id="reset-filters" class="btn-small">Réinitialiser</button>
	    <button id="apply-filters" class="btn-small primary">Appliquer</button>
      </div>
    </aside>
    	
  </section>
</main>

<?php
get_footer();
?>
