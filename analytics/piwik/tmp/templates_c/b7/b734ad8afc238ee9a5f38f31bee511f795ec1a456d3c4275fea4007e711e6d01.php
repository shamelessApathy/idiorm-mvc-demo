<?php

/* @CoreHome/_dataTableActions.twig */
class __TwigTemplate_a2250313a21c014275e21848d974d8f00e55be4dc2e9c2b1f4c68a29aad199ca extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo " ";
        $context["randomIdForDropdown"] = twig_random($this->env, 999999);
        // line 2
        echo "
    ";
        // line 3
        if (($this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "show_footer", array()) && $this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "show_footer_icons", array()))) {
            // line 4
            echo "
        <a class='dropdown-button dropdownConfigureIcon dataTableAction'
           href='javascript:;'
           data-activates='dropdownConfigure";
            // line 7
            echo \Piwik\piwik_escape_filter($this->env, ($context["randomIdForDropdown"] ?? $this->getContext($context, "randomIdForDropdown")), "html", null, true);
            echo "'><span class=\"icon-configure\"></span></a>

        ";
            // line 9
            $context["activeFooterIcon"] = "";
            // line 10
            echo "        ";
            $context["numIcons"] = 0;
            // line 11
            echo "        ";
            ob_start();
            // line 12
            echo "            <ul id='dropdownVisualizations";
            echo \Piwik\piwik_escape_filter($this->env, ($context["randomIdForDropdown"] ?? $this->getContext($context, "randomIdForDropdown")), "html", null, true);
            echo "' class='dropdown-content dataTableFooterIcons'>
                ";
            // line 13
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["footerIcons"] ?? $this->getContext($context, "footerIcons")));
            foreach ($context['_seq'] as $context["_key"] => $context["footerIconGroup"]) {
                // line 14
                echo "                    ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["footerIconGroup"], "buttons", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["footerIcon"]) {
                    if ($this->getAttribute($context["footerIcon"], "icon", array())) {
                        // line 15
                        echo "                        <li>
                            ";
                        // line 16
                        $context["numIcons"] = (($context["numIcons"] ?? $this->getContext($context, "numIcons")) + 1);
                        // line 17
                        echo "                            ";
                        $context["isActiveEcommerceView"] = ($this->getAttribute(($context["clientSideParameters"] ?? null), "abandonedCarts", array(), "any", true, true) && ((($this->getAttribute(                        // line 18
$context["footerIcon"], "id", array()) == "ecommerceOrder") && ($this->getAttribute(($context["clientSideParameters"] ?? $this->getContext($context, "clientSideParameters")), "abandonedCarts", array()) == 0)) || (($this->getAttribute(                        // line 19
$context["footerIcon"], "id", array()) == "ecommerceAbandonedCart") && ($this->getAttribute(($context["clientSideParameters"] ?? $this->getContext($context, "clientSideParameters")), "abandonedCarts", array()) == 1))));
                        // line 20
                        echo "                            <a class=\"";
                        echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["footerIconGroup"], "class", array()), "html", null, true);
                        echo " tableIcon ";
                        if ((($this->getAttribute(($context["clientSideParameters"] ?? $this->getContext($context, "clientSideParameters")), "viewDataTable", array()) == $this->getAttribute($context["footerIcon"], "id", array())) || ($context["isActiveEcommerceView"] ?? $this->getContext($context, "isActiveEcommerceView")))) {
                            echo "activeIcon";
                            $context["activeFooterIcon"] = $this->getAttribute($context["footerIcon"], "icon", array());
                        }
                        echo "\"
                               data-footer-icon-id=\"";
                        // line 21
                        echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["footerIcon"], "id", array()), "html", null, true);
                        echo "\">
                                ";
                        // line 22
                        if ((is_string($__internal_e28e4d2a5230293722cdf78a63baa0f12d7a36924e94d1cbf6df41ab4711cadf = $this->getAttribute($context["footerIcon"], "icon", array())) && is_string($__internal_450cb6b1b2b51108e65d08ba4740e68eb8322ede6bc0f8cdb6f62bd3127c9a99 = "icon-") && ('' === $__internal_450cb6b1b2b51108e65d08ba4740e68eb8322ede6bc0f8cdb6f62bd3127c9a99 || 0 === strpos($__internal_e28e4d2a5230293722cdf78a63baa0f12d7a36924e94d1cbf6df41ab4711cadf, $__internal_450cb6b1b2b51108e65d08ba4740e68eb8322ede6bc0f8cdb6f62bd3127c9a99)))) {
                            // line 23
                            echo "                                    <span title=\"";
                            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["footerIcon"], "title", array()), "html", null, true);
                            echo "\" class=\"";
                            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["footerIcon"], "icon", array()), "html", null, true);
                            echo "\"></span>
                                ";
                        } else {
                            // line 25
                            echo "                                    <img width=\"16\" height=\"16\" title=\"";
                            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["footerIcon"], "title", array()), "html", null, true);
                            echo "\" src=\"";
                            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["footerIcon"], "icon", array()), "html", null, true);
                            echo "\"/>
                                ";
                        }
                        // line 27
                        echo "                                ";
                        if ($this->getAttribute($context["footerIcon"], "title", array(), "any", true, true)) {
                            echo "<span>";
                            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["footerIcon"], "title", array()), "html", null, true);
                            echo "</span>";
                        }
                        // line 28
                        echo "                            </a>
                        </li>
                    ";
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['footerIcon'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 31
                echo "                    <li class=\"divider\"></li>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['footerIconGroup'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 33
            echo "            </ul>
        ";
            $context["visualizationIcons"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 35
            echo "
        ";
            // line 36
            if ((($context["activeFooterIcon"] ?? $this->getContext($context, "activeFooterIcon")) && (($context["numIcons"] ?? $this->getContext($context, "numIcons")) > 1))) {
                // line 37
                echo "            <a class=\"dropdown-button dataTableAction activateVisualizationSelection\"
               href=\"javascript:;\"
               data-activates=\"dropdownVisualizations";
                // line 39
                echo \Piwik\piwik_escape_filter($this->env, ($context["randomIdForDropdown"] ?? $this->getContext($context, "randomIdForDropdown")), "html", null, true);
                echo "\">
                ";
                // line 40
                if ((is_string($__internal_07c6c5d571073e04405a3110b51174ad1f214a8835f21918f2c8b1ec5c7173ae = ($context["activeFooterIcon"] ?? $this->getContext($context, "activeFooterIcon"))) && is_string($__internal_5ecd5f09f5ccceb24767b485c15d3e91edf1fb65a3e5c4f7c060994d785d27f0 = "icon-") && ('' === $__internal_5ecd5f09f5ccceb24767b485c15d3e91edf1fb65a3e5c4f7c060994d785d27f0 || 0 === strpos($__internal_07c6c5d571073e04405a3110b51174ad1f214a8835f21918f2c8b1ec5c7173ae, $__internal_5ecd5f09f5ccceb24767b485c15d3e91edf1fb65a3e5c4f7c060994d785d27f0)))) {
                    // line 41
                    echo "                    <span title=\"";
                    echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreHome_ChangeVisualization")), "html_attr");
                    echo "\" class=\"";
                    echo \Piwik\piwik_escape_filter($this->env, ($context["activeFooterIcon"] ?? $this->getContext($context, "activeFooterIcon")), "html", null, true);
                    echo "\"></span>
                ";
                } else {
                    // line 43
                    echo "                    <img title=\"";
                    echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreHome_ChangeVisualization")), "html_attr");
                    echo "\" width=\"16\" height=\"16\" src=\"";
                    echo \Piwik\piwik_escape_filter($this->env, ($context["activeFooterIcon"] ?? $this->getContext($context, "activeFooterIcon")), "html", null, true);
                    echo "\"/>
                ";
                }
                // line 45
                echo "            </a>
            ";
                // line 46
                echo ($context["visualizationIcons"] ?? $this->getContext($context, "visualizationIcons"));
                echo "
        ";
            }
            // line 48
            echo "
        ";
            // line 49
            if ($this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "show_export", array())) {
                // line 50
                echo "        <a class='dropdown-button dataTableAction activateExportSelection'
           href='javascript:;' title=\"";
                // line 51
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ExportThisReport")), "html_attr");
                echo "\"
           data-activates='dropdownExport";
                // line 52
                echo \Piwik\piwik_escape_filter($this->env, ($context["randomIdForDropdown"] ?? $this->getContext($context, "randomIdForDropdown")), "html", null, true);
                echo "'><span class=\"icon-export\"></span></a>
        ";
            }
            // line 54
            echo "
        ";
            // line 55
            if ((call_user_func_array($this->env->getFunction('isPluginLoaded')->getCallable(), array("Annotations")) &&  !$this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "hide_annotations_view", array()))) {
                // line 56
                echo "            <a class='dataTableAction annotationView'
               href='javascript:;' title=\"";
                // line 57
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Annotations_Annotations")), "html_attr");
                echo "\"
            ><span class=\"icon-annotation\"></span></a>
        ";
            }
            // line 60
            echo "
        ";
            // line 61
            if ($this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "show_search", array())) {
                // line 62
                echo "            <a class='dropdown-button dataTableAction searchAction'
               href='javascript:;' title=\"";
                // line 63
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Search")), "html_attr");
                echo "\"
               ><span class=\"icon-search\"></span>
                <span class=\"icon-close\" title=\"";
                // line 65
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreHome_CloseSearch")), "html_attr");
                echo "\"></span>
                <input id=\"widgetSearch_";
                // line 66
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "report_id", array()), "html", null, true);
                echo "\"
                       title=\"";
                // line 67
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreHome_DataTableHowToSearch")), "html_attr");
                echo "\"
                       type=\"text\"
                       class=\"dataTableSearchInput browser-default\" />
            </a>
        ";
            }
            // line 72
            echo "
        ";
            // line 73
            if ($this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "show_export", array())) {
                // line 74
                echo "        <ul id='dropdownExport";
                echo \Piwik\piwik_escape_filter($this->env, ($context["randomIdForDropdown"] ?? $this->getContext($context, "randomIdForDropdown")), "html", null, true);
                echo "' class='dropdown-content exportToFormatItems'>
            ";
                // line 75
                $context["requestParams"] = twig_jsonencode_filter($this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "request_parameters_to_modify", array()));
                // line 76
                echo "            <li><a target=\"_blank\" requestParams=\"";
                echo \Piwik\piwik_escape_filter($this->env, ($context["requestParams"] ?? $this->getContext($context, "requestParams")), "html_attr");
                echo "\" methodToCall=\"";
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "apiMethodToRequestDataTable", array()), "html", null, true);
                echo "\" format=\"CSV\" filter_limit=\"";
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "filter_limit", array()), "html", null, true);
                echo "\">CSV</a></li>
            <li><a target=\"_blank\" requestParams=\"";
                // line 77
                echo \Piwik\piwik_escape_filter($this->env, ($context["requestParams"] ?? $this->getContext($context, "requestParams")), "html_attr");
                echo "\" methodToCall=\"";
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "apiMethodToRequestDataTable", array()), "html", null, true);
                echo "\" format=\"TSV\" filter_limit=\"";
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "filter_limit", array()), "html", null, true);
                echo "\">TSV (Excel)</a></li>
            <li><a target=\"_blank\" requestParams=\"";
                // line 78
                echo \Piwik\piwik_escape_filter($this->env, ($context["requestParams"] ?? $this->getContext($context, "requestParams")), "html_attr");
                echo "\" methodToCall=\"";
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "apiMethodToRequestDataTable", array()), "html", null, true);
                echo "\" format=\"XML\" filter_limit=\"";
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "filter_limit", array()), "html", null, true);
                echo "\">XML</a></li>
            <li><a target=\"_blank\" requestParams=\"";
                // line 79
                echo \Piwik\piwik_escape_filter($this->env, ($context["requestParams"] ?? $this->getContext($context, "requestParams")), "html_attr");
                echo "\" methodToCall=\"";
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "apiMethodToRequestDataTable", array()), "html", null, true);
                echo "\" format=\"JSON\" filter_limit=\"";
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "filter_limit", array()), "html", null, true);
                echo "\">Json</a></li>
            <li><a target=\"_blank\" requestParams=\"";
                // line 80
                echo \Piwik\piwik_escape_filter($this->env, ($context["requestParams"] ?? $this->getContext($context, "requestParams")), "html_attr");
                echo "\" methodToCall=\"";
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "apiMethodToRequestDataTable", array()), "html", null, true);
                echo "\" format=\"PHP\" filter_limit=\"";
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "filter_limit", array()), "html", null, true);
                echo "\">Php</a></li>
            ";
                // line 81
                if ($this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "show_export_as_rss_feed", array())) {
                    // line 82
                    echo "                <li><a target=\"_blank\" requestParams=\"";
                    echo \Piwik\piwik_escape_filter($this->env, ($context["requestParams"] ?? $this->getContext($context, "requestParams")), "html_attr");
                    echo "\" methodToCall=\"";
                    echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "apiMethodToRequestDataTable", array()), "html", null, true);
                    echo "\" format=\"RSS\" filter_limit=\"";
                    echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "filter_limit", array()), "html", null, true);
                    echo "\" date=\"last10\">
                        <span class=\"icon-feed\"></span> RSS
                    </a>
                </li>
            ";
                }
                // line 87
                echo "            ";
                if ($this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "show_export_as_image_icon", array())) {
                    // line 88
                    echo "                <li><a class=\"tableIcon\" href=\"javascript:;\" id=\"dataTableFooterExportAsImageIcon\" onclick=\"\$(this).closest('.dataTable').find('div.jqplot-target').trigger('piwikExportAsImage'); return false;\">
                        <span class=\"icon-image\"></span>
                        ";
                    // line 90
                    echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ExportAsImage")), "html", null, true);
                    echo "
                    </a>
                </li>
            ";
                }
                // line 94
                echo "        </ul>
        ";
            }
            // line 96
            echo "
        <ul id='dropdownConfigure";
            // line 97
            echo \Piwik\piwik_escape_filter($this->env, ($context["randomIdForDropdown"] ?? $this->getContext($context, "randomIdForDropdown")), "html", null, true);
            echo "' class='dropdown-content tableConfiguration'>
            ";
            // line 98
            if ($this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "show_flatten_table", array())) {
                // line 99
                echo "                ";
                if (($this->getAttribute(($context["clientSideParameters"] ?? null), "flat", array(), "any", true, true) && ($this->getAttribute(($context["clientSideParameters"] ?? $this->getContext($context, "clientSideParameters")), "flat", array()) == 1))) {
                    // line 100
                    echo "                    <li>
                        <div class=\"configItem dataTableIncludeAggregateRows\"></div>
                    </li>
                ";
                }
                // line 104
                echo "                <li>
                    <div class=\"configItem dataTableFlatten\"></div>
                </li>
            ";
            }
            // line 108
            echo "            ";
            if ($this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "show_exclude_low_population", array())) {
                // line 109
                echo "                <li>
                    <div class=\"configItem dataTableExcludeLowPopulation\"></div>
                </li>
            ";
            }
            // line 113
            echo "            ";
            if ( !twig_test_empty((($this->getAttribute(($context["properties"] ?? null), "show_pivot_by_subtable", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["properties"] ?? null), "show_pivot_by_subtable", array()))) : ("")))) {
                // line 114
                echo "                <li>
                    <div class=\"configItem dataTablePivotBySubtable\"></div>
                </li>
            ";
            }
            // line 118
            echo "        </ul>
    ";
        }
    }

    public function getTemplateName()
    {
        return "@CoreHome/_dataTableActions.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  356 => 118,  350 => 114,  347 => 113,  341 => 109,  338 => 108,  332 => 104,  326 => 100,  323 => 99,  321 => 98,  317 => 97,  314 => 96,  310 => 94,  303 => 90,  299 => 88,  296 => 87,  283 => 82,  281 => 81,  273 => 80,  265 => 79,  257 => 78,  249 => 77,  240 => 76,  238 => 75,  233 => 74,  231 => 73,  228 => 72,  220 => 67,  216 => 66,  212 => 65,  207 => 63,  204 => 62,  202 => 61,  199 => 60,  193 => 57,  190 => 56,  188 => 55,  185 => 54,  180 => 52,  176 => 51,  173 => 50,  171 => 49,  168 => 48,  163 => 46,  160 => 45,  152 => 43,  144 => 41,  142 => 40,  138 => 39,  134 => 37,  132 => 36,  129 => 35,  125 => 33,  118 => 31,  109 => 28,  102 => 27,  94 => 25,  86 => 23,  84 => 22,  80 => 21,  70 => 20,  68 => 19,  67 => 18,  65 => 17,  63 => 16,  60 => 15,  54 => 14,  50 => 13,  45 => 12,  42 => 11,  39 => 10,  37 => 9,  32 => 7,  27 => 4,  25 => 3,  22 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source(" {% set randomIdForDropdown = random(999999) %}

    {% if properties.show_footer and properties.show_footer_icons %}

        <a class='dropdown-button dropdownConfigureIcon dataTableAction'
           href='javascript:;'
           data-activates='dropdownConfigure{{ randomIdForDropdown }}'><span class=\"icon-configure\"></span></a>

        {% set activeFooterIcon = '' %}
        {% set numIcons = 0 %}
        {% set visualizationIcons %}
            <ul id='dropdownVisualizations{{ randomIdForDropdown }}' class='dropdown-content dataTableFooterIcons'>
                {% for footerIconGroup in footerIcons %}
                    {% for footerIcon in footerIconGroup.buttons if footerIcon.icon %}
                        <li>
                            {% set numIcons = numIcons + 1 %}
                            {% set isActiveEcommerceView = clientSideParameters.abandonedCarts is defined and
                            ((footerIcon.id == 'ecommerceOrder' and clientSideParameters.abandonedCarts == 0) or
                            (footerIcon.id == 'ecommerceAbandonedCart' and clientSideParameters.abandonedCarts == 1)) %}
                            <a class=\"{{ footerIconGroup.class }} tableIcon {% if clientSideParameters.viewDataTable == footerIcon.id or isActiveEcommerceView %}activeIcon{% set activeFooterIcon = footerIcon.icon %}{% endif %}\"
                               data-footer-icon-id=\"{{ footerIcon.id }}\">
                                {% if footerIcon.icon starts with 'icon-' %}
                                    <span title=\"{{ footerIcon.title }}\" class=\"{{ footerIcon.icon }}\"></span>
                                {% else %}
                                    <img width=\"16\" height=\"16\" title=\"{{ footerIcon.title }}\" src=\"{{ footerIcon.icon }}\"/>
                                {% endif %}
                                {% if footerIcon.title is defined %}<span>{{ footerIcon.title }}</span>{% endif %}
                            </a>
                        </li>
                    {% endfor %}
                    <li class=\"divider\"></li>
                {% endfor %}
            </ul>
        {% endset %}

        {% if activeFooterIcon and numIcons > 1 %}
            <a class=\"dropdown-button dataTableAction activateVisualizationSelection\"
               href=\"javascript:;\"
               data-activates=\"dropdownVisualizations{{ randomIdForDropdown }}\">
                {% if activeFooterIcon starts with 'icon-' %}
                    <span title=\"{{ 'CoreHome_ChangeVisualization'|translate|e('html_attr') }}\" class=\"{{ activeFooterIcon }}\"></span>
                {% else %}
                    <img title=\"{{ 'CoreHome_ChangeVisualization'|translate|e('html_attr') }}\" width=\"16\" height=\"16\" src=\"{{ activeFooterIcon }}\"/>
                {% endif %}
            </a>
            {{ visualizationIcons|raw }}
        {% endif %}

        {% if properties.show_export %}
        <a class='dropdown-button dataTableAction activateExportSelection'
           href='javascript:;' title=\"{{ 'General_ExportThisReport'|translate|e('html_attr') }}\"
           data-activates='dropdownExport{{ randomIdForDropdown }}'><span class=\"icon-export\"></span></a>
        {% endif %}

        {% if isPluginLoaded('Annotations') and not properties.hide_annotations_view %}
            <a class='dataTableAction annotationView'
               href='javascript:;' title=\"{{ 'Annotations_Annotations'|translate|e('html_attr') }}\"
            ><span class=\"icon-annotation\"></span></a>
        {% endif %}

        {% if properties.show_search %}
            <a class='dropdown-button dataTableAction searchAction'
               href='javascript:;' title=\"{{ 'General_Search'|translate|e('html_attr') }}\"
               ><span class=\"icon-search\"></span>
                <span class=\"icon-close\" title=\"{{ 'CoreHome_CloseSearch'|translate|e('html_attr') }}\"></span>
                <input id=\"widgetSearch_{{ properties.report_id }}\"
                       title=\"{{ 'CoreHome_DataTableHowToSearch'|translate|e('html_attr') }}\"
                       type=\"text\"
                       class=\"dataTableSearchInput browser-default\" />
            </a>
        {% endif %}

        {% if properties.show_export %}
        <ul id='dropdownExport{{ randomIdForDropdown }}' class='dropdown-content exportToFormatItems'>
            {% set requestParams = properties.request_parameters_to_modify|json_encode %}
            <li><a target=\"_blank\" requestParams=\"{{ requestParams|e('html_attr') }}\" methodToCall=\"{{ properties.apiMethodToRequestDataTable }}\" format=\"CSV\" filter_limit=\"{{ properties.filter_limit }}\">CSV</a></li>
            <li><a target=\"_blank\" requestParams=\"{{ requestParams|e('html_attr') }}\" methodToCall=\"{{ properties.apiMethodToRequestDataTable }}\" format=\"TSV\" filter_limit=\"{{ properties.filter_limit }}\">TSV (Excel)</a></li>
            <li><a target=\"_blank\" requestParams=\"{{ requestParams|e('html_attr') }}\" methodToCall=\"{{ properties.apiMethodToRequestDataTable }}\" format=\"XML\" filter_limit=\"{{ properties.filter_limit }}\">XML</a></li>
            <li><a target=\"_blank\" requestParams=\"{{ requestParams|e('html_attr') }}\" methodToCall=\"{{ properties.apiMethodToRequestDataTable }}\" format=\"JSON\" filter_limit=\"{{ properties.filter_limit }}\">Json</a></li>
            <li><a target=\"_blank\" requestParams=\"{{ requestParams|e('html_attr') }}\" methodToCall=\"{{ properties.apiMethodToRequestDataTable }}\" format=\"PHP\" filter_limit=\"{{ properties.filter_limit }}\">Php</a></li>
            {% if properties.show_export_as_rss_feed %}
                <li><a target=\"_blank\" requestParams=\"{{ requestParams|e('html_attr') }}\" methodToCall=\"{{ properties.apiMethodToRequestDataTable }}\" format=\"RSS\" filter_limit=\"{{ properties.filter_limit }}\" date=\"last10\">
                        <span class=\"icon-feed\"></span> RSS
                    </a>
                </li>
            {% endif %}
            {% if properties.show_export_as_image_icon %}
                <li><a class=\"tableIcon\" href=\"javascript:;\" id=\"dataTableFooterExportAsImageIcon\" onclick=\"\$(this).closest('.dataTable').find('div.jqplot-target').trigger('piwikExportAsImage'); return false;\">
                        <span class=\"icon-image\"></span>
                        {{ 'General_ExportAsImage'|translate }}
                    </a>
                </li>
            {% endif %}
        </ul>
        {% endif %}

        <ul id='dropdownConfigure{{ randomIdForDropdown }}' class='dropdown-content tableConfiguration'>
            {% if properties.show_flatten_table %}
                {% if clientSideParameters.flat is defined and clientSideParameters.flat == 1 %}
                    <li>
                        <div class=\"configItem dataTableIncludeAggregateRows\"></div>
                    </li>
                {% endif %}
                <li>
                    <div class=\"configItem dataTableFlatten\"></div>
                </li>
            {% endif %}
            {% if properties.show_exclude_low_population %}
                <li>
                    <div class=\"configItem dataTableExcludeLowPopulation\"></div>
                </li>
            {% endif %}
            {% if properties.show_pivot_by_subtable|default is not empty %}
                <li>
                    <div class=\"configItem dataTablePivotBySubtable\"></div>
                </li>
            {% endif %}
        </ul>
    {% endif %}", "@CoreHome/_dataTableActions.twig", "/var/www/idiorm/idiorm-mvc-demo/analytics/piwik/plugins/CoreHome/templates/_dataTableActions.twig");
    }
}
