<span class="title"><?=$I18N_calculator?></span>
<?
	include('/m23/inc/calculator.php');

	HTML_showFormHeader();

	HTML_setPage('calculator');
	CALC_showCalculator();

	HTML_showFormEnd();
?>