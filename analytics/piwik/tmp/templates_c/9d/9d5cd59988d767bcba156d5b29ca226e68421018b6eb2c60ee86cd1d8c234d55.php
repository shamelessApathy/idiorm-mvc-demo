<?php

/* @Live/_visitorLogIcons.twig */
class __TwigTemplate_960503606360fefeb3b555211841ef86593396840e190776ba796c86378ecc17 extends Twig_Template
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
        $context["visitHasEcommerceActivity"] = $this->getAttribute(($context["visitor"] ?? $this->getContext($context, "visitor")), "getColumn", array(0 => "visitEcommerceStatusIcon"), "method");
        // line 2
        $context["breakBeforeVisitorRank"] = (((($context["visitHasEcommerceActivity"] ?? $this->getContext($context, "visitHasEcommerceActivity")) && $this->getAttribute(($context["visitor"] ?? $this->getContext($context, "visitor")), "getColumn", array(0 => "visitorTypeIcon"), "method"))) ? (true) : (false));
        // line 3
        echo "
<span class=\"visitorLogIcons\">

    <span class=\"visitorDetails\">
    ";
        // line 7
        if ($this->getAttribute(($context["visitor"] ?? $this->getContext($context, "visitor")), "getColumn", array(0 => "visitorTypeIcon"), "method")) {
            // line 8
            echo "        <span class=\"visitorLogIconWithDetails visitorTypeIcon\">
            <img src=\"";
            // line 9
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["visitor"] ?? $this->getContext($context, "visitor")), "getColumn", array(0 => "visitorTypeIcon"), "method"), "html", null, true);
            echo "\"/>
            <ul class=\"details\">
                <li>";
            // line 11
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ReturningVisitor")), "html", null, true);
            echo " - ";
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_NVisits", $this->getAttribute(($context["visitor"] ?? $this->getContext($context, "visitor")), "getColumn", array(0 => "visitCount"), "method"))), "html", null, true);
            echo "</li>
            </ul>
        </span>
    ";
        }
        // line 15
        echo "    ";
        if ($this->getAttribute(($context["visitor"] ?? $this->getContext($context, "visitor")), "getColumn", array(0 => "countryFlag"), "method")) {
            // line 16
            echo "        <span class=\"visitorLogIconWithDetails flag\" profile-header-text=\"";
            if ($this->getAttribute(($context["visitor"] ?? $this->getContext($context, "visitor")), "getColumn", array(0 => "city"), "method")) {
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["visitor"] ?? $this->getContext($context, "visitor")), "getColumn", array(0 => "city"), "method"), "html_attr");
            } else {
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["visitor"] ?? $this->getContext($context, "visitor")), "getColumn", array(0 => "country"), "method"), "html", null, true);
            }
            echo "\">

            <img src=\"";
            // line 18
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["visitor"] ?? $this->getContext($context, "visitor")), "getColumn", array(0 => "countryFlag"), "method"), "html", null, true);
            echo "\"/>
            <ul class=\"details\">
                <li>";
            // line 20
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_Country")), "html", null, true);
            echo ": ";
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["visitor"] ?? $this->getContext($context, "visitor")), "getColumn", array(0 => "country"), "method"), "html", null, true);
            echo "</li>
                ";
            // line 21
            if ($this->getAttribute(($context["visitor"] ?? $this->getContext($context, "visitor")), "getColumn", array(0 => "region"), "method")) {
                echo "<li>";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_Region")), "html", null, true);
                echo ": ";
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["visitor"] ?? $this->getContext($context, "visitor")), "getColumn", array(0 => "region"), "method"), "html", null, true);
                echo "</li>";
            }
            // line 22
            echo "                ";
            if ($this->getAttribute(($context["visitor"] ?? $this->getContext($context, "visitor")), "getColumn", array(0 => "city"), "method")) {
                echo "<li>";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_City")), "html", null, true);
                echo ": ";
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["visitor"] ?? $this->getContext($context, "visitor")), "getColumn", array(0 => "city"), "method"), "html", null, true);
                echo "</li>";
            }
            // line 23
            echo "                ";
            if ($this->getAttribute(($context["visitor"] ?? $this->getContext($context, "visitor")), "getColumn", array(0 => "language"), "method")) {
                echo "<li>";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserLanguage_BrowserLanguage")), "html", null, true);
                echo ": ";
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["visitor"] ?? $this->getContext($context, "visitor")), "getColumn", array(0 => "language"), "method"), "html", null, true);
                echo "</li>";
            }
            // line 24
            echo "            </ul>
        </span>
    ";
        }
        // line 27
        echo "    ";
        if ($this->getAttribute(($context["visitor"] ?? $this->getContext($context, "visitor")), "getColumn", array(0 => "browserIcon"), "method")) {
            // line 28
            echo "        <span class=\"visitorLogIconWithDetails\" profile-header-text=\"";
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["visitor"] ?? $this->getContext($context, "visitor")), "getColumn", array(0 => "browser"), "method"), "html_attr");
            echo "\">
            <img src=\"";
            // line 29
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["visitor"] ?? $this->getContext($context, "visitor")), "getColumn", array(0 => "browserIcon"), "method"), "html", null, true);
            echo "\"/>
            <ul class=\"details\">
                <li>";
            // line 31
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("DevicesDetection_ColumnBrowser")), "html", null, true);
            echo ": ";
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["visitor"] ?? $this->getContext($context, "visitor")), "getColumn", array(0 => "browser"), "method"), "html", null, true);
            echo "</li>
                <li>";
            // line 32
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("DevicesDetection_BrowserEngine")), "html", null, true);
            echo ": ";
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["visitor"] ?? $this->getContext($context, "visitor")), "getColumn", array(0 => "browserFamily"), "method"), "html", null, true);
            echo "</li>
                ";
            // line 33
            if ((twig_length_filter($this->env, $this->getAttribute(($context["visitor"] ?? $this->getContext($context, "visitor")), "getColumn", array(0 => "pluginsIcons"), "method")) > 0)) {
                // line 34
                echo "                    <li>
                        ";
                // line 35
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Plugins")), "html", null, true);
                echo ":
                        ";
                // line 36
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["visitor"] ?? $this->getContext($context, "visitor")), "getColumn", array(0 => "pluginsIcons"), "method"));
                foreach ($context['_seq'] as $context["_key"] => $context["pluginIcon"]) {
                    // line 37
                    echo "                            <img width=\"16px\" height=\"16px\" src=\"";
                    echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["pluginIcon"], "pluginIcon", array()), "html", null, true);
                    echo "\" alt=\"";
                    echo \Piwik\piwik_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($context["pluginIcon"], "pluginName", array()), true), "html", null, true);
                    echo "\"/>
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pluginIcon'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 39
                echo "                    </li>
                ";
            }
            // line 41
            echo "            </ul>
        </span>
    ";
        }
        // line 44
        echo "        ";
        if ($this->getAttribute(($context["visitor"] ?? $this->getContext($context, "visitor")), "getColumn", array(0 => "operatingSystemIcon"), "method")) {
            // line 45
            echo "            <span class=\"visitorLogIconWithDetails\" profile-header-text=\"";
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["visitor"] ?? $this->getContext($context, "visitor")), "getColumn", array(0 => "operatingSystem"), "method"), "html_attr");
            echo "\">
            <img src=\"";
            // line 46
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["visitor"] ?? $this->getContext($context, "visitor")), "getColumn", array(0 => "operatingSystemIcon"), "method"), "html", null, true);
            echo "\"/>
            <ul class=\"details\">
                <li>";
            // line 48
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("DevicesDetection_ColumnOperatingSystem")), "html", null, true);
            echo ": ";
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["visitor"] ?? $this->getContext($context, "visitor")), "getColumn", array(0 => "operatingSystem"), "method"), "html", null, true);
            echo "</li>
            </ul>
        </span>
        ";
        }
        // line 52
        echo "        ";
        if ($this->getAttribute(($context["visitor"] ?? $this->getContext($context, "visitor")), "getColumn", array(0 => "deviceTypeIcon"), "method")) {
            // line 53
            echo "            <span class=\"visitorLogIconWithDetails\" profile-header-text=\"";
            if ($this->getAttribute(($context["visitor"] ?? $this->getContext($context, "visitor")), "getColumn", array(0 => "resolution"), "method")) {
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["visitor"] ?? $this->getContext($context, "visitor")), "getColumn", array(0 => "resolution"), "method"), "html_attr");
            } else {
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["visitor"] ?? $this->getContext($context, "visitor")), "getColumn", array(0 => "deviceType"), "method"), "html", null, true);
            }
            echo "\">
            <img src=\"";
            // line 54
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["visitor"] ?? $this->getContext($context, "visitor")), "getColumn", array(0 => "deviceTypeIcon"), "method"), "html", null, true);
            echo "\"/>
            <ul class=\"details\">
                <li>";
            // line 56
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("DevicesDetection_DeviceType")), "html", null, true);
            echo ": ";
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["visitor"] ?? $this->getContext($context, "visitor")), "getColumn", array(0 => "deviceType"), "method"), "html", null, true);
            echo "</li>
                ";
            // line 57
            if ($this->getAttribute(($context["visitor"] ?? $this->getContext($context, "visitor")), "getColumn", array(0 => "deviceBrand"), "method")) {
                echo "<li>";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("DevicesDetection_DeviceBrand")), "html", null, true);
                echo ": ";
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["visitor"] ?? $this->getContext($context, "visitor")), "getColumn", array(0 => "deviceBrand"), "method"), "html", null, true);
                echo "</li>";
            }
            // line 58
            echo "                ";
            if ($this->getAttribute(($context["visitor"] ?? $this->getContext($context, "visitor")), "getColumn", array(0 => "deviceModel"), "method")) {
                echo "<li>";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("DevicesDetection_DeviceModel")), "html", null, true);
                echo ": ";
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["visitor"] ?? $this->getContext($context, "visitor")), "getColumn", array(0 => "deviceModel"), "method"), "html", null, true);
                echo "</li>";
            }
            // line 59
            echo "                ";
            if ($this->getAttribute(($context["visitor"] ?? $this->getContext($context, "visitor")), "getColumn", array(0 => "resolution"), "method")) {
                echo "<li>";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Resolution_ColumnResolution")), "html", null, true);
                echo ": ";
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["visitor"] ?? $this->getContext($context, "visitor")), "getColumn", array(0 => "resolution"), "method"), "html", null, true);
                echo "</li>";
            }
            // line 60
            echo "            </ul>
        </span>
        ";
        }
        // line 63
        echo "    </span>

    ";
        // line 65
        if (($this->getAttribute(($context["visitor"] ?? $this->getContext($context, "visitor")), "getColumn", array(0 => "goalConversions"), "method") || ($context["visitHasEcommerceActivity"] ?? $this->getContext($context, "visitHasEcommerceActivity")))) {
            // line 66
            echo "    <span class=\"visitorType\">
        ";
            // line 68
            echo "        ";
            if ($this->getAttribute(($context["visitor"] ?? $this->getContext($context, "visitor")), "getColumn", array(0 => "goalConversions"), "method")) {
                // line 69
                echo "            <span title=\"";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_VisitConvertedNGoals", $this->getAttribute(($context["visitor"] ?? $this->getContext($context, "visitor")), "getColumn", array(0 => "goalConversions"), "method"))), "html", null, true);
                echo "\" class='visitorRank visitorLogTooltip'
                  ";
                // line 70
                if ((($context["isWidget"] ?? $this->getContext($context, "isWidget")) || ($context["breakBeforeVisitorRank"] ?? $this->getContext($context, "breakBeforeVisitorRank")))) {
                    echo "style=\"margin-left:0;\"";
                }
                echo ">
                <img src=\"";
                // line 71
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["visitor"] ?? $this->getContext($context, "visitor")), "getColumn", array(0 => "visitConvertedIcon"), "method"), "html", null, true);
                echo "\"/>
                ";
                // line 72
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["visitor"] ?? $this->getContext($context, "visitor")), "getColumn", array(0 => "goalConversions"), "method"), "html", null, true);
                echo "
                ";
                // line 73
                if (($context["visitHasEcommerceActivity"] ?? $this->getContext($context, "visitHasEcommerceActivity"))) {
                    // line 74
                    echo "                    &nbsp;
                    <img src=\"";
                    // line 75
                    echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["visitor"] ?? $this->getContext($context, "visitor")), "getColumn", array(0 => "visitEcommerceStatusIcon"), "method"), "html", null, true);
                    echo "\" class='visitorLogTooltip' title=\"";
                    echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["visitor"] ?? $this->getContext($context, "visitor")), "getColumn", array(0 => "visitEcommerceStatus"), "method"), "html", null, true);
                    echo "\"/>
                ";
                }
                // line 77
                echo "            </span>
        ";
                // line 79
                echo "        ";
            } elseif (($context["visitHasEcommerceActivity"] ?? $this->getContext($context, "visitHasEcommerceActivity"))) {
                // line 80
                echo "            <img class=\"visitorLogTooltip\" src=\"";
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["visitor"] ?? $this->getContext($context, "visitor")), "getColumn", array(0 => "visitEcommerceStatusIcon"), "method"), "html", null, true);
                echo "\" title=\"";
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["visitor"] ?? $this->getContext($context, "visitor")), "getColumn", array(0 => "visitEcommerceStatus"), "method"), "html", null, true);
                echo "\"/>
        ";
            }
            // line 82
            echo "    </span>
    ";
        }
        // line 84
        echo "</span>
";
    }

    public function getTemplateName()
    {
        return "@Live/_visitorLogIcons.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  298 => 84,  294 => 82,  286 => 80,  283 => 79,  280 => 77,  273 => 75,  270 => 74,  268 => 73,  264 => 72,  260 => 71,  254 => 70,  249 => 69,  246 => 68,  243 => 66,  241 => 65,  237 => 63,  232 => 60,  223 => 59,  214 => 58,  206 => 57,  200 => 56,  195 => 54,  186 => 53,  183 => 52,  174 => 48,  169 => 46,  164 => 45,  161 => 44,  156 => 41,  152 => 39,  141 => 37,  137 => 36,  133 => 35,  130 => 34,  128 => 33,  122 => 32,  116 => 31,  111 => 29,  106 => 28,  103 => 27,  98 => 24,  89 => 23,  80 => 22,  72 => 21,  66 => 20,  61 => 18,  51 => 16,  48 => 15,  39 => 11,  34 => 9,  31 => 8,  29 => 7,  23 => 3,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% set visitHasEcommerceActivity = visitor.getColumn('visitEcommerceStatusIcon') %}
{% set breakBeforeVisitorRank = (visitHasEcommerceActivity and visitor.getColumn('visitorTypeIcon')) ? true : false %}

<span class=\"visitorLogIcons\">

    <span class=\"visitorDetails\">
    {% if visitor.getColumn('visitorTypeIcon') %}
        <span class=\"visitorLogIconWithDetails visitorTypeIcon\">
            <img src=\"{{ visitor.getColumn('visitorTypeIcon') }}\"/>
            <ul class=\"details\">
                <li>{{ 'General_ReturningVisitor'|translate }} - {{ 'General_NVisits'|translate(visitor.getColumn('visitCount')) }}</li>
            </ul>
        </span>
    {% endif %}
    {% if visitor.getColumn('countryFlag') %}
        <span class=\"visitorLogIconWithDetails flag\" profile-header-text=\"{% if visitor.getColumn('city') %}{{ visitor.getColumn('city')|e('html_attr') }}{% else %}{{ visitor.getColumn('country') }}{% endif %}\">

            <img src=\"{{ visitor.getColumn('countryFlag') }}\"/>
            <ul class=\"details\">
                <li>{{ 'UserCountry_Country'|translate }}: {{ visitor.getColumn('country') }}</li>
                {% if visitor.getColumn('region') %}<li>{{ 'UserCountry_Region'|translate }}: {{ visitor.getColumn('region') }}</li>{% endif %}
                {% if visitor.getColumn('city') %}<li>{{ 'UserCountry_City'|translate }}: {{ visitor.getColumn('city') }}</li>{% endif %}
                {% if visitor.getColumn('language') %}<li>{{ 'UserLanguage_BrowserLanguage'|translate }}: {{ visitor.getColumn('language') }}</li>{% endif %}
            </ul>
        </span>
    {% endif %}
    {% if visitor.getColumn('browserIcon') %}
        <span class=\"visitorLogIconWithDetails\" profile-header-text=\"{{ visitor.getColumn('browser')|e('html_attr') }}\">
            <img src=\"{{ visitor.getColumn('browserIcon') }}\"/>
            <ul class=\"details\">
                <li>{{ 'DevicesDetection_ColumnBrowser'|translate }}: {{ visitor.getColumn('browser') }}</li>
                <li>{{ 'DevicesDetection_BrowserEngine'|translate }}: {{ visitor.getColumn('browserFamily') }}</li>
                {% if visitor.getColumn('pluginsIcons')|length > 0 %}
                    <li>
                        {{ 'General_Plugins'|translate }}:
                        {% for pluginIcon in visitor.getColumn('pluginsIcons') %}
                            <img width=\"16px\" height=\"16px\" src=\"{{ pluginIcon.pluginIcon }}\" alt=\"{{ pluginIcon.pluginName|capitalize(true) }}\"/>
                        {% endfor %}
                    </li>
                {% endif %}
            </ul>
        </span>
    {% endif %}
        {% if visitor.getColumn('operatingSystemIcon') %}
            <span class=\"visitorLogIconWithDetails\" profile-header-text=\"{{ visitor.getColumn('operatingSystem')|e('html_attr') }}\">
            <img src=\"{{ visitor.getColumn('operatingSystemIcon') }}\"/>
            <ul class=\"details\">
                <li>{{ 'DevicesDetection_ColumnOperatingSystem'|translate }}: {{ visitor.getColumn('operatingSystem') }}</li>
            </ul>
        </span>
        {% endif %}
        {% if visitor.getColumn('deviceTypeIcon') %}
            <span class=\"visitorLogIconWithDetails\" profile-header-text=\"{% if visitor.getColumn('resolution') %}{{ visitor.getColumn('resolution')|e('html_attr') }}{% else %}{{ visitor.getColumn('deviceType') }}{% endif %}\">
            <img src=\"{{ visitor.getColumn('deviceTypeIcon') }}\"/>
            <ul class=\"details\">
                <li>{{ 'DevicesDetection_DeviceType'|translate }}: {{ visitor.getColumn('deviceType') }}</li>
                {% if visitor.getColumn('deviceBrand') %}<li>{{ 'DevicesDetection_DeviceBrand'|translate }}: {{ visitor.getColumn('deviceBrand') }}</li>{% endif %}
                {% if visitor.getColumn('deviceModel') %}<li>{{ 'DevicesDetection_DeviceModel'|translate }}: {{ visitor.getColumn('deviceModel') }}</li>{% endif %}
                {% if visitor.getColumn('resolution') %}<li>{{ 'Resolution_ColumnResolution'|translate }}: {{ visitor.getColumn('resolution') }}</li>{% endif %}
            </ul>
        </span>
        {% endif %}
    </span>

    {% if visitor.getColumn('goalConversions') or visitHasEcommerceActivity %}
    <span class=\"visitorType\">
        {# Goals, and/or Ecommerce activity #}
        {% if visitor.getColumn('goalConversions') %}
            <span title=\"{{ 'General_VisitConvertedNGoals'|translate(visitor.getColumn('goalConversions')) }}\" class='visitorRank visitorLogTooltip'
                  {% if isWidget or breakBeforeVisitorRank %}style=\"margin-left:0;\"{% endif %}>
                <img src=\"{{ visitor.getColumn('visitConvertedIcon') }}\"/>
                {{ visitor.getColumn('goalConversions') }}
                {% if visitHasEcommerceActivity %}
                    &nbsp;
                    <img src=\"{{ visitor.getColumn('visitEcommerceStatusIcon') }}\" class='visitorLogTooltip' title=\"{{ visitor.getColumn('visitEcommerceStatus') }}\"/>
                {% endif %}
            </span>
        {# Ecommerce activity only (no goal) #}
        {% elseif visitHasEcommerceActivity %}
            <img class=\"visitorLogTooltip\" src=\"{{ visitor.getColumn('visitEcommerceStatusIcon') }}\" title=\"{{ visitor.getColumn('visitEcommerceStatus') }}\"/>
        {% endif %}
    </span>
    {% endif %}
</span>
", "@Live/_visitorLogIcons.twig", "/var/www/idiorm/idiorm-mvc-demo/analytics/piwik/plugins/Live/templates/_visitorLogIcons.twig");
    }
}
