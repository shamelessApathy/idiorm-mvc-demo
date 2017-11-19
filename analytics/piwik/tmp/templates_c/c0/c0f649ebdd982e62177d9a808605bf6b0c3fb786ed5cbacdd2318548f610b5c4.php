<?php

/* @Live/_profileSummaryVisits.twig */
class __TwigTemplate_29eececbec5df52108696f1901cf89648999b694a298045a4177b190e5519015 extends Twig_Template
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
        echo "<div class=\"visitor-profile-summary visitor-profile-important-visits\">";
        // line 2
        $context["keywordNotDefined"] = call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_NotDefined", call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnKeyword"))));
        // line 3
        echo "<div>
        <h1>";
        // line 4
        if (($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "visitsAggregated", array()) == 100)) {
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Visit")), "html", null, true);
            echo "# 100";
        } else {
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_FirstVisit")), "html", null, true);
        }
        echo "</h1>
        <div>
            <p><strong>";
        // line 6
        echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "firstVisit", array()), "prettyDate", array()), "html", null, true);
        echo "</strong>&nbsp;- ";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountryMap_DaysAgo", $this->getAttribute($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "firstVisit", array()), "daysAgo", array()))), "html", null, true);
        echo "</p>
            <p>
                ";
        // line 8
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_FromReferrer")), "html", null, true);
        echo " <strong ";
        if ((($this->getAttribute($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "firstVisit", array()), "referrerType", array()) == "search") && !twig_in_filter("(", $this->getAttribute($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "firstVisit", array()), "referralSummary", array())))) {
            echo "title=\"";
            echo \Piwik\piwik_escape_filter($this->env, ($context["keywordNotDefined"] ?? $this->getContext($context, "keywordNotDefined")), "html", null, true);
            echo "\"";
        }
        echo ">";
        // line 9
        if (($this->getAttribute($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "firstVisit", array()), "referrerType", array()) == "website")) {
            // line 10
            echo "                        <a href=\"";
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "firstVisit", array()), "referrerUrl", array()), "html", null, true);
            echo "\" target=\"_blank\">
                            ";
            // line 11
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "firstVisit", array()), "referralSummary", array()), "html", null, true);
            echo "
                        </a>
                    ";
        } else {
            // line 14
            echo "                        ";
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "firstVisit", array()), "referralSummary", array()), "html", null, true);
            echo "
                    ";
        }
        // line 16
        echo "                </strong>
            </p>
        </div>
    </div>
    ";
        // line 20
        if (($this->getAttribute($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "lastVisits", array()), "getRowsCount", array(), "method") != 1)) {
            // line 21
            echo "        <div>
            <h1>";
            // line 22
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_LastVisit")), "html", null, true);
            echo "</h1>
            <div>
                <p><strong>";
            // line 24
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "lastVisit", array()), "prettyDate", array()), "html", null, true);
            echo "</strong>&nbsp;- ";
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountryMap_DaysAgo", $this->getAttribute($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "lastVisit", array()), "daysAgo", array()))), "html", null, true);
            echo "</p>
                <p>
                    ";
            // line 26
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_FromReferrer")), "html", null, true);
            echo " <strong ";
            if ((($this->getAttribute($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "lastVisit", array()), "referrerType", array()) == "search") && !twig_in_filter("(", $this->getAttribute($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "lastVisit", array()), "referralSummary", array())))) {
                echo "title=\"";
                echo \Piwik\piwik_escape_filter($this->env, ($context["keywordNotDefined"] ?? $this->getContext($context, "keywordNotDefined")), "html", null, true);
                echo "\"";
            }
            echo ">";
            // line 27
            if (($this->getAttribute($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "lastVisit", array()), "referrerType", array()) == "website")) {
                // line 28
                echo "                            <a href=\"";
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "lastVisit", array()), "referrerUrl", array()), "html", null, true);
                echo "\" target=\"_blank\">
                                ";
                // line 29
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "lastVisit", array()), "referralSummary", array()), "html", null, true);
                echo "
                            </a>
                        ";
            } else {
                // line 32
                echo "                            ";
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "lastVisit", array()), "referralSummary", array()), "html", null, true);
                echo "
                        ";
            }
            // line 34
            echo "                    </strong>
                </p>
            </div>
        </div>
    ";
        }
        // line 39
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "@Live/_profileSummaryVisits.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  129 => 39,  122 => 34,  116 => 32,  110 => 29,  105 => 28,  103 => 27,  94 => 26,  87 => 24,  82 => 22,  79 => 21,  77 => 20,  71 => 16,  65 => 14,  59 => 11,  54 => 10,  52 => 9,  43 => 8,  36 => 6,  26 => 4,  23 => 3,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"visitor-profile-summary visitor-profile-important-visits\">
    {%- set keywordNotDefined = 'General_NotDefined'|translate('General_ColumnKeyword'|translate) -%}
    <div>
        <h1>{% if visitorData.visitsAggregated == 100 %}{{ 'General_Visit'|translate }}# 100{% else %}{{ 'Live_FirstVisit'|translate }}{% endif %}</h1>
        <div>
            <p><strong>{{ visitorData.firstVisit.prettyDate }}</strong>&nbsp;- {{ 'UserCountryMap_DaysAgo'|translate(visitorData.firstVisit.daysAgo) }}</p>
            <p>
                {{ 'General_FromReferrer'|translate }} <strong {% if visitorData.firstVisit.referrerType == 'search' and '(' not in visitorData.firstVisit.referralSummary %}title=\"{{ keywordNotDefined }}\"{% endif %}>
                    {%- if visitorData.firstVisit.referrerType == 'website' %}
                        <a href=\"{{ visitorData.firstVisit.referrerUrl }}\" target=\"_blank\">
                            {{ visitorData.firstVisit.referralSummary }}
                        </a>
                    {% else %}
                        {{ visitorData.firstVisit.referralSummary }}
                    {% endif %}
                </strong>
            </p>
        </div>
    </div>
    {% if visitorData.lastVisits.getRowsCount() != 1 %}
        <div>
            <h1>{{ 'Live_LastVisit'|translate }}</h1>
            <div>
                <p><strong>{{ visitorData.lastVisit.prettyDate }}</strong>&nbsp;- {{ 'UserCountryMap_DaysAgo'|translate(visitorData.lastVisit.daysAgo) }}</p>
                <p>
                    {{ 'General_FromReferrer'|translate }} <strong {% if visitorData.lastVisit.referrerType == 'search' and '(' not in visitorData.lastVisit.referralSummary %}title=\"{{ keywordNotDefined }}\"{% endif %}>
                        {%- if visitorData.lastVisit.referrerType == 'website' %}
                            <a href=\"{{ visitorData.lastVisit.referrerUrl }}\" target=\"_blank\">
                                {{ visitorData.lastVisit.referralSummary }}
                            </a>
                        {% else %}
                            {{ visitorData.lastVisit.referralSummary }}
                        {% endif %}
                    </strong>
                </p>
            </div>
        </div>
    {% endif %}
</div>", "@Live/_profileSummaryVisits.twig", "/var/www/idiorm/idiorm-mvc-demo/analytics/piwik/plugins/Live/templates/_profileSummaryVisits.twig");
    }
}
