<?php
	HTML_showTitle($I18N_clientPartitioningAndFormating);
	MSG_showMessageBoxPlaceholder();

	if ($_GET['clearSession'] == 1)
		FDISK_fdiskSessionReset(true);

	HTML_showFormHeader();
	HTML_showTableHeader(true, 'subtable', 'width="100%" cellspacing=10');

	FDISK_showCombinedFdiskGUIDialog();

	HTML_showTableEnd(true);
	HTML_setPage(FDISK_fdiskSessionPage());
	HTML_showFormEnd();

	help_showhelp('clientPartitionFormat');
?>