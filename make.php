<?php
header('Content-Type: text/html;charset=utf-8');

if ($_SERVER['HTTP_HOST'] != 'localhost')
{
    file_put_contents('geoip.zip', file_get_contents('http://software77.net/geo-ip/?DL=2'));

    $zip = new ZipArchive;
    if ($zip->open('geoip.zip') === TRUE) {
        $zip->extractTo(dirname(__FILE__));
        $zip->close();
    } else {
        echo 'failed';
        exit;
    }
}

$str = file_get_contents('IpToCountry.csv');

$list = array('il' => 'Israel','ZZ' => 'Reserved','AU' => 'Australia','CN' => 'China','JP' => 'Japan','TH' => 'Thailand','IN' => 'India','MY' => 'Malaysia','KR' => 'Korea Republic of','HK' => 'Hong Kong','TW' => 'Taiwan; Republic of China (ROC)','PH' => 'Philippines','VN' => 'Viet Nam','FR' => 'France','EU' => 'European Union','GB' => 'United Kingdom','IT' => 'Italy','AE' => 'United Arab Emirates','IL' => 'Israel','UA' => 'Ukraine','RU' => 'Russian Federation','SE' => 'Sweden','KZ' => 'Kazakhstan','PT' => 'Portugal','GR' => 'Greece','SA' => 'Saudi Arabia','DK' => 'Denmark','ES' => 'Spain','IR' => 'Iran (ISLAMIC Republic Of)','NO' => 'Norway','DE' => 'Germany','US' => 'United States','SY' => 'Syrian Arab Republic','CY' => 'Cyprus','CZ' => 'Czech Republic','CH' => 'Switzerland','IQ' => 'Iraq','NL' => 'Netherlands','TR' => 'Turkey','RO' => 'Romania','LB' => 'Lebanon','HU' => 'Hungary','GE' => 'Georgia','AZ' => 'Azerbaijan','AT' => 'Austria','PS' => 'Palestinian Territory Occupied','LT' => 'Lithuania','OM' => 'Oman','RS' => 'Serbia','FI' => 'Finland','BE' => 'Belgium','BG' => 'Bulgaria','SI' => 'Slovenia','MD' => 'Moldova Republic of','MK' => 'Macedonia','EE' => 'Estonia','LI' => 'Liechtenstein','HR' => 'Croatia (LOCAL Name : Hrvatska)','PL' => 'Poland','BA' => 'Bosnia and Herzegowina','LV' => 'Latvia','JO' => 'Jordan','KG' => 'Kyrgyzstan','IE' => 'Ireland','LY' => 'Libyan Arab Jamahiriya','AM' => 'Armenia','YE' => 'Yemen','BY' => 'Belarus','GI' => 'Gibraltar','LU' => 'Luxembourg','SK' => 'Slovakia (SLOVAK Republic)','MT' => 'Malta','NZ' => 'New Zealand','SG' => 'Singapore','ID' => 'Indonesia','NP' => 'Nepal','PG' => 'Papua New Guinea','PK' => 'Pakistan','CA' => 'Canada','BB' => 'Barbados','PR' => 'Puerto Rico','BS' => 'Bahamas','VC' => 'Saint Vincent and The Grenadines','AR' => 'Argentina','BD' => 'Bangladesh','TK' => 'Tokelau','KH' => 'Cambodia','MO' => 'Macau','MV' => 'Maldives','AF' => 'Afghanistan','NC' => 'New Caledonia','FJ' => 'Fiji','MN' => 'Mongolia','WF' => 'Wallis and Futuna Islands','QA' => 'Qatar','IS' => 'Iceland','AL' => 'Albania','SL' => 'Sierra Leone','UZ' => 'Uzbekistan','JE' => 'Jersey','SM' => 'San Marino','KW' => 'Kuwait','ME' => 'Montenegro','TJ' => 'Tajikistan','BH' => 'Bahrain','ZA' => 'South Africa','EG' => 'Egypt','ZW' => 'Zimbabwe','LR' => 'Liberia','KE' => 'Kenya','GH' => 'Ghana','NG' => 'Nigeria','TZ' => 'Tanzania United Republic of','ZM' => 'Zambia','MG' => 'Madagascar','AO' => 'Angola','NA' => 'Namibia','CI' => 'Cote D\'ivoire','SD' => 'Sudan','CM' => 'Cameroon','MW' => 'Malawi','GA' => 'Gabon','ML' => 'Mali','BJ' => 'Benin','TD' => 'Chad','BW' => 'Botswana','CV' => 'Cape Verde','RW' => 'Rwanda','CG' => 'Congo','UG' => 'Uganda','MZ' => 'Mozambique','GM' => 'Gambia','LS' => 'Lesotho','MU' => 'Mauritius','MA' => 'Morocco','DZ' => 'Algeria','GN' => 'Guinea','CD' => 'Congo The Democratic Republic of The','SZ' => 'Swaziland','BF' => 'Burkina Faso','SO' => 'Somalia','NE' => 'Niger','CF' => 'Central African Republic','TG' => 'Togo','SS' => 'South Sudan','BI' => 'Burundi','GQ' => 'Equatorial Guinea','SC' => 'Seychelles','SN' => 'Senegal','MR' => 'Mauritania','DJ' => 'Djibouti','RE' => 'Reunion','TN' => 'Tunisia','YT' => 'Mayotte','GL' => 'Greenland','VA' => 'Holy See (VATICAN City State)','VG' => 'Virgin Islands (BRITISH)','FO' => 'Faroe Islands','GG' => 'Guernsey','GU' => 'Guam','NU' => 'Niue','MM' => 'Myanmar','BN' => 'Brunei Darussalam','LK' => 'Sri Lanka','KY' => 'Cayman Islands','JM' => 'Jamaica','TT' => 'Trinidad and Tobago','DO' => 'Dominican Republic','BM' => 'Bermuda','TC' => 'Turks and Caicos Islands','VI' => 'Virgin Islands (U.S.)','CO' => 'Colombia','AG' => 'Antigua and Barbuda','PM' => 'St. Pierre and Miquelon','MF' => 'Saint Martin','GD' => 'Grenada','IM' => 'Isle of Man','MC' => 'Monaco','AD' => 'Andorra','TM' => 'Turkmenistan','MQ' => 'Martinique','LA' => 'Lao People\'s Democratic Republic','MP' => 'Northern Mariana Islands','SB' => 'Solomon Islands','PF' => 'French Polynesia','VU' => 'Vanuatu','BT' => 'Bhutan','WS' => 'Samoa','NR' => 'Nauru','KI' => 'Kiribati','PW' => 'Palau','TO' => 'Tonga','MH' => 'Marshall Islands','FM' => 'Micronesia Federated States of','VE' => 'Venezuela','MX' => 'Mexico','BR' => 'Brazil','CR' => 'Costa Rica','CL' => 'Chile','PE' => 'Peru','UY' => 'Uruguay','EC' => 'Ecuador','HN' => 'Honduras','NI' => 'Nicaragua','BQ' => 'Bonaire; Sint Eustatius; Saba','CW' => 'Curacao','HT' => 'Haiti','GF' => 'French Guiana','BO' => 'Bolivia','DM' => 'Dominica','AI' => 'Anguilla','PA' => 'Panama','GT' => 'Guatemala','SV' => 'El Salvador','CU' => 'Cuba','KP' => 'Korea Democratic People\'s Republic of','PY' => 'Paraguay','BZ' => 'Belize','TL' => 'Timor-leste','GY' => 'Guyana','SR' => 'Suriname','SX' => 'Sint Maarten','AW' => 'Aruba','GP' => 'Guadeloupe','GW' => 'Guinea-bissau','ER' => 'Eritrea','ET' => 'Ethiopia','ST' => 'Sao Tome and Principe','KM' => 'Comoros','KN' => 'Saint Kitts and Nevis','UM' => 'United States Minor Outlying Islands','MS' => 'Montserrat','TV' => 'Tuvalu','IO' => 'British Indian Ocean Territory','CK' => 'Cook Islands','AS' => 'American Samoa','NF' => 'Norfolk Island','LC' => 'Saint Lucia');

$only_countries = false;
$exclude_countries = false;

$only_countries = array('US','GB', 'VN');
// $exclude_countries = array('SG', 'CN', 'TH', 'JP', 'TW', 'KR');


$offset = 0;
$data = array();
$countryMap = array();

while(preg_match('#
    "(?P<IPFROM>.+?)",
    "(?P<IPTO>.+?)",
    "(?P<REGISTRY>.+?)",
    "(?P<ASSIGNED>.+?)",
    "(?P<CTRY>.+?)",
    "(?P<CNTRY>.+?)",
    "(?P<COUNTRY>.+?)"#ix', $str, $match, PREG_OFFSET_CAPTURE, $offset)
) {
    $offset = $match[0][1] + strlen($match[0][0]);

    if ($only_countries && !in_array($match['CTRY'][0], $only_countries)) {
        continue;
    }
    if ($exclude_countries && in_array($match['CTRY'][0], $exclude_countries)) {
        continue;
    }

    if (!isset($data[$match['CTRY'][0]]))
    {
        $data[$match['CTRY'][0]] = array(
            'FROM' => array(),
            'TO'   => array(),
        );
    }
    $data[$match['CTRY'][0]]['FROM'][] = $match['IPFROM'][0];
    $data[$match['CTRY'][0]]['TO'][]   = $match['IPTO'][0];
    $countryMap[$match['CTRY'][0]]  = $match['COUNTRY'][0];
}
foreach (array_keys($data) as $key)
{
    asort($data[$key]['TO']);
    asort($data[$key]['FROM']);
}

// merge
$k = null;
foreach ($data as $ctry => $info)
{
    for ($i = 0; $i < count($data[$ctry]['FROM']); $i ++)
    {
        if (isset($k) && $data[$ctry]['TO'][$k]+1 == $data[$ctry]['FROM'][$i])
        {
            $data[$ctry]['TO'][$k] = $data[$ctry]['TO'][$i];
            unset($data[$ctry]['TO'][$i], $data[$ctry]['FROM'][$i]);
            continue;
        }
        $k = $i;
    }
}

$export_from    = "\$geoip['ipfrom'] = array(";
$export_to      = "\$geoip['ipto'] = array(";
$export_offset  = "\$geoip['offsets'] = array(";
$export_mapping = "\$geoip['country_map'] = array(";

$current = 0;
foreach ($data as $ctry => $info)
{
    $end = $current + count($info['FROM']) - 1;

    $export_from    .= implode(',', $info['FROM']) . ',';
    $export_to      .= implode(',', $info['TO']) . ',';
    $export_offset  .= "'$ctry' => array($current, $end)" . ',';
    $export_mapping .= "'$ctry' => '" . addslashes($countryMap[$ctry]) . "'" . ',';

    $current = $end + 1;
}
$export_from    = trim($export_from, ',') . ');';
$export_to      = trim($export_to, ',') . ');';
$export_offset  = trim($export_offset, ',') . ');';
$export_mapping = trim($export_mapping, ',') . ');';
$export_count   = "\$geoip['count'] = " . ($current - 1) . ';';

$phpcode =
    $export_from . PHP_EOL .
    $export_to . PHP_EOL .
    $export_offset . PHP_EOL .
    $export_mapping . PHP_EOL .
    $export_count . PHP_EOL;

$export = '<?php
/*
# Script written by Phan Thanh Cong <ptcong90@gmail.com>
# Generated date: ' .date('M d, Y')
. ($only_countries ? '
#
# This script always return "ZZ" for code, "Reserved" for name
# if the IP is NOT IN the countries: ' . implode(',', $only_countries) : '')
. ($exclude_countries ? '
# This script always return "ZZ" for code, "Reserved" for name
# if the IP is IN countries: ' . implode(',',  $exclude_countries) : '') .
'
#
# ------------------------------------------------------------------------------
# The IP Country data is from: http://Software77.net (A Webnet77.com Company)
#
# Please review the following copy of license for more information:
#
# INFORMATION AND NOTES ON IpToCountry.csv.gz
# ===========================================
#
# ------------------------------------------------------------------------------
# LICENSE
# =======
# This database is provided FREE under the terms of the
# GENERAL PUBLIC LICENSE, June 1991
# ------------------------------------------------------------------------------
#
# Generator         : ip.pl on http://Software77.net (A Webnet77.com Company)
# Software Author   : BRM
# Contact           : http://Webnet77.com/contact.html
# Download          : http://software77.net/cgi-bin/ip-country/geo-ip.pl

# To do an automated download with something like wget, use the following link
# format (some versions of wget may require you add the http:// prefix):
#
# wget software77.net/geo-ip/?DL=1 -O /path/IpToCountry.csv.gz      IPV4 gzip
# wget software77.net/geo-ip/?DL=2 -O /path/IpToCountry.csv.zip     IPV4 zip
# wget software77.net/geo-ip/?DL=3 -O /path/IpToCountry.csv.MD5     IPV4 MD5 (CSV file)
# wget software77.net/geo-ip/?DL=4 -O /path/IpToCountry.dat         IPV4 Geo::IPfree
# wget software77.net/geo-ip/?DL=5 -O /path/IpToCountry.dat.MD5     IPV4 MD5 Geo::IPfree
# wget software77.net/geo-ip/?DL=6 -O /path/country-codes.txt       Country Codes
# wget software77.net/geo-ip/?DL=7 -O /path/IpToCountry.6R.csv.gz   IPV6 Ranges
# wget software77.net/geo-ip/?DL=8 -O /path/IpToCountry.6R.csv.MD5  IPV6 Ranges MD5
# wget software77.net/geo-ip/?DL=9 -O /path/IpToCountry.6C.csv.gz   IPV6 CIDR
# wget software77.net/geo-ip/?DL=10 -O /path/IpToCountry.6C.csv.MD5 IPV6 CIDR MD5
# Please NOTE the "/" before the "?"
#
# ------------------------------------------------------------------------------
#
# IMPORTANT NOTES
# ===============
# If you discover a bug in the database, please let us know at the contact
# address above.
#
# What this database is
# =====================
#
# This Database is operated and maintained by Webnet77 and updated every 1
# days and represents [almost] all  2 billion IP numbers [approximately] in use on the
# internet today.
#
# This Database is automatically reconstituted every 1 days by special
# software running on our servers. The bottom of the main page shows how long ago
# it was updated as well as giving an indication of when the next update will
# take place.
# ------------------------------------------------------------------------------
#
# FILE FORMAT
# ================
#
#      --------------------------------------------------------------
#      All lines beginning with either "#" or whitespace are comments
#      --------------------------------------------------------------
#
# IP FROM      IP TO        REGISTRY  ASSIGNED   CTRY CNTRY COUNTRY
# "1346797568","1346801663","ripencc","20010601","il","isr","Israel"
#
# IP FROM & : Numerical representation of IP address.
# IP TO       Example: (from Right to Left)
#             1.2.3.4 = 4 + (3 * 256) + (2 * 256 * 256) + (1 * 256 * 256 * 256)
#             is 4 + 768 + 13,1072 + 16,777,216 = 16,909,060
#
# REGISTRY  : apcnic, arin, lacnic, ripencc and afrinic
#             Also included as of April 22, 2005 are the IANA IETF Reserved
#             address numbers. These are important since any source claiming
#             to be from one of these IPs must be spoofed.
#
# ASSIGNED  : The date this IP or block was assigned. (In Epoch seconds)
#             NOTE: Where the allocation or assignment has been transferred from
#                   one registry to another, the date represents the date of first
#                   assignment or allocation as received in from the original RIR.
#                   It is noted that where records do not show a date of first
#                   assignment, the date is given as "0".
#
# CTRY      : 2 character international country code
#             NOTE: ISO 3166 2-letter code of the organisation to which the
#             allocation or assignment was made, and the enumerated variances of:
#                  AP - non-specific Asia-Pacific location
#                  CS - Serbia and Montenegro
#                  YU - Serbia and Montenegro (Formally Yugoslavia) (Being phased out)
#                  EU - non-specific European Union location
#                  FX - France, Metropolitan
#                  PS - Palestinian Territory, Occupied
#                  UK - United Kingdom (standard says GB)
#                * ZZ - IETF RESERVED address space.
# ------------------------------------------------------------------------------
*/

/**
 * Gets country code <name> by ipaddress.
 *
 * @param  string $ip
 * @param  string $type string (code, name)
 * @return string
 */
function ip2country($ip, $type = "code")
{
    $ip = trim($ip);

    static
        $ipcache = array(),
        $geoip = array();
    if (empty($geoip)) {
        ' . $phpcode . '
    }
    if (empty($ipcache[$ip])) {
        $code = "ZZ";
        $numbers = explode(".", $ip);
        $ipto = $numbers[3];
        for ($i = 2; $i >= 0; $i--) {
            $ipto += $numbers[$i] * pow(256, 3 - $i);
        }
        for ($i = 0; $i < $geoip["count"]; $i ++) {
            if ($ipto >= $geoip["ipfrom"][$i] && $ipto <= $geoip["ipto"][$i]) {
                foreach ($geoip["offsets"] as $c => $offset) {
                    if ($i > $offset[0] && $i <= $offset[1]) {
                        $code = $c;
                        break 2;
                    }
                }
            }
        }
        $ipcache[$ip] = $code;
    }
    if ($type == "name") {
        return $geoip["country_map"][$ipcache[$ip]];
    }
    return $ipcache[$ip];
}
';

file_put_contents('geoip.php', $export);

if ($_SERVER['HTTP_HOST'] != 'localhost')
{
    header('Content-Disposition: attachment; filename="geoip.php"');
    readfile('geoip.php');
}


