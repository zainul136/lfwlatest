<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Countries extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            DB::statement("INSERT INTO `countries` (`id`, `name`, `code`, `flag_filepath`, `created_at`, `updated_at`) VALUES
                (1, 'Afghanistan', 'AF', 'country/af.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (2, 'Albania', 'AL', 'country/al.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (3, 'Algeria', 'DZ', 'country/dz.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (4, 'Andorra', 'AD', 'country/ad.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (5, 'Angola', 'AO', 'country/ao.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (6, 'Antigua and Barbuda', 'AG', 'country/ag.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (7, 'Argentina', 'AR', 'country/ar.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (8, 'Armenia', 'AM', 'country/am.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (9, 'Australia', 'AU', 'country/au.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (10, 'Austria', 'AT', 'country/at.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (11, 'Azerbaijan', 'AZ', 'country/az.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (12, 'Bahamas', 'BS', 'country/bs.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (13, 'Bahrain', 'BH', 'country/bh.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (14, 'Bangladesh', 'BD', 'country/bd.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (15, 'Barbados', 'BB', 'country/bb.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (16, 'Belarus', 'BY', 'country/by.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (17, 'Belgium', 'BE', 'country/be.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (18, 'Belize', 'BZ', 'country/bz.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (19, 'Benin', 'BJ', 'country/bj.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (20, 'Bhutan', 'BT', 'country/bt.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (21, 'Bolivia', 'BO', 'country/bo.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (22, 'Bosnia and Herzegovina', 'BA', 'country/ba.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (23, 'Botswana', 'BW', 'country/bw.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (24, 'Brazil', 'BR', 'country/br.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (25, 'Brunei', 'BN', 'country/bn.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (26, 'Bulgaria', 'BG', 'country/bg.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (27, 'Burkina Faso', 'BF', 'country/bf.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (28, 'Burundi', 'BI', 'country/bi.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (29, 'Cabo Verde', 'CV', 'country/cv.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (30, 'Cambodia', 'KH', 'country/kh.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (31, 'Cameroon', 'CM', 'country/cm.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (32, 'Canada', 'CA', 'country/ca.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (33, 'Central African Republic', 'CF', 'country/cf.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (34, 'Chad', 'TD', 'country/td.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (35, 'Chile', 'CL', 'country/cl.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (36, 'China', 'CN', 'country/cn.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (37, 'Colombia', 'CO', 'country/co.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (38, 'Comoros', 'KM', 'country/km.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (39, 'Congo', 'CG', 'country/cg.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (40, 'Costa Rica', 'CR', 'country/cr.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (41, 'Croatia', 'HR', 'country/hr.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (42, 'Cuba', 'CU', 'country/cu.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (43, 'Cyprus', 'CY', 'country/cy.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (44, 'Czechia', 'CZ', 'country/cz.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (45, 'Democratic Republic of the Congo', 'CD', 'country/cd.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (46, 'Denmark', 'DK', 'country/dk.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (47, 'Djibouti', 'DJ', 'country/dj.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (48, 'Dominica', 'DM', 'country/dm.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (49, 'Dominican Republic', 'DO', 'country/do.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (50, 'East Timor', 'TL', 'country/tl.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (51, 'Ecuador', 'EC', 'country/ec.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (52, 'Egypt', 'EG', 'country/eg.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (53, 'El Salvador', 'SV', 'country/sv.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (54, 'Equatorial Guinea', 'GQ', 'country/gq.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (55, 'Eritrea', 'ER', 'country/er.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (56, 'Estonia', 'EE', 'country/ee.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (57, 'Eswatini', 'SZ', 'country/sz.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (58, 'Ethiopia', 'ET', 'country/et.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (59, 'Fiji', 'FJ', 'country/fj.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (60, 'Finland', 'FI', 'country/fi.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (61, 'France', 'FR', 'country/fr.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (62, 'Gabon', 'GA', 'country/ga.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (63, 'Gambia', 'GM', 'country/gm.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (64, 'Georgia', 'GE', 'country/ge.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (65, 'Germany', 'DE', 'country/de.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (66, 'Ghana', 'GH', 'country/gh.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (67, 'Greece', 'GR', 'country/gr.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (68, 'Grenada', 'GD', 'country/gd.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (69, 'Guatemala', 'GT', 'country/gt.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (70, 'Guinea', 'GN', 'country/gn.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (71, 'Guinea-Bissau', 'GW', 'country/gw.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (72, 'Guyana', 'GY', 'country/gy.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (73, 'Haiti', 'HT', 'country/ht.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (74, 'Honduras', 'HN', 'country/hn.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (75, 'Hungary', 'HU', 'country/hu.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (76, 'Iceland', 'IS', 'country/is.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (77, 'India', 'IN', 'country/in.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (78, 'Indonesia', 'ID', 'country/id.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (79, 'Iran', 'IR', 'country/ir.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (80, 'Iraq', 'IQ', 'country/iq.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (81, 'Ireland', 'IE', 'country/ie.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (82, 'Israel', 'IL', 'country/il.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (83, 'Italy', 'IT', 'country/it.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (84, 'Ivory Coast', 'CI', 'country/ci.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (85, 'Jamaica', 'JM', 'country/jm.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (86, 'Japan', 'JP', 'country/jp.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (87, 'Jordan', 'JO', 'country/jo.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (88, 'Kazakhstan', 'KZ', 'country/kz.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (89, 'Kenya', 'KE', 'country/ke.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (90, 'Kiribati', 'KI', 'country/ki.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (91, 'Korea, North', 'KP', 'country/kp.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (92, 'Korea, South', 'KR', 'country/kr.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (93, 'Kosovo', 'XK', 'country/xk.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (94, 'Kuwait', 'KW', 'country/kw.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (95, 'Kyrgyzstan', 'KG', 'country/kg.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (96, 'Laos', 'LA', 'country/la.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (97, 'Latvia', 'LV', 'country/lv.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (98, 'Lebanon', 'LB', 'country/lb.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (99, 'Lesotho', 'LS', 'country/ls.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (100, 'Liberia', 'LR', 'country/lr.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (101, 'Libya', 'LY', 'country/ly.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (102, 'Liechtenstein', 'LI', 'country/li.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (103, 'Lithuania', 'LT', 'country/lt.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (104, 'Luxembourg', 'LU', 'country/lu.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (105, 'Macedonia', 'MK', 'country/mk.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (106, 'Madagascar', 'MG', 'country/mg.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (107, 'Malawi', 'MW', 'country/mw.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (108, 'Malaysia', 'MY', 'country/my.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (109, 'Maldives', 'MV', 'country/mv.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (110, 'Mali', 'ML', 'country/ml.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (111, 'Malta', 'MT', 'country/mt.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (112, 'Marshall Islands', 'MH', 'country/mh.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (113, 'Mauritania', 'MR', 'country/mr.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (114, 'Mauritius', 'MU', 'country/mu.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (115, 'Mexico', 'MX', 'country/mx.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (116, 'Micronesia', 'FM', 'country/fm.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (117, 'Moldova', 'MD', 'country/md.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (118, 'Monaco', 'MC', 'country/mc.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (119, 'Mongolia', 'MN', 'country/mn.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (120, 'Montenegro', 'ME', 'country/me.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (121, 'Morocco', 'MA', 'country/ma.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (122, 'Mozambique', 'MZ', 'country/mz.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (123, 'Myanmar', 'MM', 'country/mm.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (124, 'Namibia', 'NA', 'country/na.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (125, 'Nauru', 'NR', 'country/nr.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (126, 'Nepal', 'NP', 'country/np.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (127, 'Netherlands', 'NL', 'country/nl.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (128, 'New Zealand', 'NZ', 'country/nz.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (129, 'Nicaragua', 'NI', 'country/ni.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (130, 'Niger', 'NE', 'country/ne.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (131, 'Nigeria', 'NG', 'country/ng.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (132, 'Norway', 'NO', 'country/no.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (133, 'Oman', 'OM', 'country/om.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (134, 'Pakistan', 'PK', 'country/pk.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (135, 'Palau', 'PW', 'country/pw.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (136, 'Palestine State', 'PS', 'country/ps.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (137, 'Panama', 'PA', 'country/pa.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (138, 'Papua New Guinea', 'PG', 'country/pg.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (139, 'Paraguay', 'PY', 'country/py.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (140, 'Peru', 'PE', 'country/pe.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (141, 'Philippines', 'PH', 'country/ph.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (142, 'Poland', 'PL', 'country/pl.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (143, 'Portugal', 'PT', 'country/pt.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (144, 'Qatar', 'QA', 'country/qa.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (145, 'Romania', 'RO', 'country/ro.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (146, 'Russia', 'RU', 'country/ru.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (147, 'Rwanda', 'RW', 'country/rw.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (148, 'Saint Kitts and Nevis', 'KN', 'country/kn.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (149, 'Saint Lucia', 'LC', 'country/lc.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (150, 'Saint Vincent and the Grenadines', 'VC', 'country/vc.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (151, 'Samoa', 'WS', 'country/ws.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (152, 'San Marino', 'SM', 'country/sm.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (153, 'Sao Tome and Principe', 'ST', 'country/st.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (154, 'Saudi Arabia', 'SA', 'country/sa.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (155, 'Senegal', 'SN', 'country/sn.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (156, 'Serbia', 'RS', 'country/rs.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (157, 'Seychelles', 'SC', 'country/sc.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (158, 'Sierra Leone', 'SL', 'country/sl.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (159, 'Singapore', 'SG', 'country/sg.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (160, 'Slovakia', 'SK', 'country/sk.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (161, 'Slovenia', 'SI', 'country/si.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (162, 'Solomon Islands', 'SB', 'country/sb.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (163, 'Somalia', 'SO', 'country/so.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (164, 'South Africa', 'ZA', 'country/za.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (165, 'South Sudan', 'SS', 'country/ss.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (166, 'Spain', 'ES', 'country/es.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (167, 'Sri Lanka', 'LK', 'country/lk.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (168, 'Sudan', 'SD', 'country/sd.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (169, 'Suriname', 'SR', 'country/sr.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (170, 'Sweden', 'SE', 'country/se.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (171, 'Switzerland', 'CH', 'country/ch.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (172, 'Syria', 'SY', 'country/sy.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (173, 'Taiwan', 'TW', 'country/tw.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (174, 'Tajikistan', 'TJ', 'country/tj.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (175, 'Tanzania', 'TZ', 'country/tz.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (176, 'Thailand', 'TH', 'country/th.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (177, 'Togo', 'TG', 'country/tg.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (178, 'Tonga', 'TO', 'country/to.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (179, 'Trinidad and Tobago', 'TT', 'country/tt.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (180, 'Tunisia', 'TN', 'country/tn.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (181, 'Turkey', 'TR', 'country/tr.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (182, 'Turkmenistan', 'TM', 'country/tm.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (183, 'Tuvalu', 'TV', 'country/tv.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (184, 'Uganda', 'UG', 'country/ug.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (185, 'Ukraine', 'UA', 'country/ua.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (186, 'United Arab Emirates', 'AE', 'country/ae.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (187, 'United Kingdom', 'GB', 'country/gb.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (188, 'United States', 'US', 'country/us.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (189, 'Uruguay', 'UY', 'country/uy.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (190, 'Uzbekistan', 'UZ', 'country/uz.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (191, 'Vanuatu', 'VU', 'country/vu.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (192, 'Venezuela', 'VE', 'country/ve.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (193, 'Vietnam', 'VN', 'country/vn.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (194, 'Yemen', 'YE', 'country/ye.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (195, 'Zambia', 'ZM', 'country/zm.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14'),
                (196, 'Zimbabwe', 'ZW', 'country/zw.png', '2023-10-10 04:45:14', '2023-10-10 04:45:14')");

    }
}
