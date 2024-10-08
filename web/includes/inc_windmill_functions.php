<?php

function display_menu_item($name, $link, $icon) {

  echo "    <li class=\"relative px-6 py-3\">\r\n";
  echo "        <a\r\n";
  echo "        class=\"inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200\"\r\n";
  echo "        href=\"" . $g_options['scripturl'] . $link . "\">\r\n";
  Echo "            <span class=\"ml-4\"><i class=\"fas fa-" . $icon . "\"></i>&nbsp;" . $name . "</span>\r\n";
  echo "        </a>\r\n";
  echo "    </li>\r\n";

}

function display_links($name, $link, $icon){

    echo "                      <li class=\"flex\">\r\n";
    echo "                          <a\r\n";
    echo "                              class=\"inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200\"\r\n";
    echo "                              href=\"" . $link . "\">\r\n";
    echo "                                  <span><i class=\"fas fa-" . $icon . "\"></i>&nbsp;" . $name ."</span>\r\n";
    echo "                          </a>\r\n";
    echo "                      </li>\r\n";
}

function display_page_title($title){

    echo "              <div\r\n";
    echo "                class=\"windmill-title-bar flex items-center justify-between p-4 mt-8 mb-8 text-l font-semibold rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple\"\r\n";
    echo "                >\r\n";
    echo "                  " . $title . "\r\n" ;
    echo "              </div>\r\n";

}

function display_page_subtitle($title){

	echo "<h4 class=\"mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300\">" . $title . "</h4>";

}

/**
 * getWindmillSortArrow()
 * 
 * @param mixed $sort
 * @param mixed $sortorder
 * @param mixed $name
 * @param mixed $longname
 * @param string $var_sort
 * @param string $var_sortorder
 * @param string $sorthash
 * @return string Returns the code for a sort arrow <IMG> tag.
 */
function getWindmillSortArrow($sort, $sortorder, $name, $longname, $var_sort = 'sort', $var_sortorder =
	'sortorder', $sorthash = '', $ajax = false)
{
	global $g_options;

	if ($sortorder == 'asc')
	{
		$sortimg = 'fas fa-sort-amount-down';
		$othersortorder = 'desc';
	}
	else
	{
		$sortimg = 'fas fa-sort-amount-up';
		$othersortorder = 'asc';
	}
	
	$arrowstring = '<a href="' . $g_options['scripturl'] . '?' . makeQueryString($var_sort, $name,
		array($var_sortorder));

	if ($sort == $name)
	{
		$arrowstring .= "&amp;$var_sortorder=$othersortorder";
		$jsarrow = "'" . $var_sortorder . "': '" . $othersortorder . "'";
	}
	else
	{
		$arrowstring .= "&amp;$var_sortorder=$sortorder";
		$jsarrow = "'" . $var_sortorder . "': '" . $sortorder . "'";
	}

	if ($sorthash)
	{
		$arrowstring .= "#$sorthash";
	}

	$arrowstring .= '" class="head"';
	
	if ( $ajax )
	{
		$arrowstring .= " onclick=\"Tabs.refreshTab({'$var_sort': '$name', $jsarrow}); return false;\"";
	}
	
	$arrowstring .= ' title="Change sorting order">' . "$longname</a>";

	if ($sort == $name)
	{
		$arrowstring .= '&nbsp;<i class="' . $sortimg . '"></i>&nbsp;';
	}


	return $arrowstring;
}



?>