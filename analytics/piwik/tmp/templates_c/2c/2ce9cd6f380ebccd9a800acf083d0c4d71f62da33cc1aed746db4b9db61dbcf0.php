<?php

/* @Live/_dataTableViz_visitorLog.twig */
class __TwigTemplate_c9d68b9db890ad84ddef0180307eff9538706c7bd440bd3c9806450e3336b9f1 extends Twig_Template
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
        $context["displayVisitorsInOwnColumn"] = ((($context["isWidget"] ?? $this->getContext($context, "isWidget"))) ? (false) : (true));
        // line 2
        echo "
";
        // line 3
        $context["cycleIndex"] = 0;
        // line 4
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["dataTable"] ?? $this->getContext($context, "dataTable")), "getRows", array(), "method"));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["visitor"]) {
            // line 5
            echo "    ";
            ob_start();
            // line 6
            echo "        <div class=\"card row hoverable\">

            ";
            // line 8
            if (( !twig_test_empty($this->getAttribute($context["visitor"], "getColumn", array(0 => "visitorId"), "method")) &&  !$this->getAttribute(($context["clientSideParameters"] ?? $this->getContext($context, "clientSideParameters")), "hideProfileLink", array()))) {
                // line 9
                echo "                <a class=\"visitor-log-visitor-profile-link visitorLogTooltip\" title=\"";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_ViewVisitorProfile")), "html", null, true);
                echo "\" data-visitor-id=\"";
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "visitorId"), "method"), "html", null, true);
                echo "\">
                    <img src=\"plugins/Live/images/visitorProfileLaunch.png\"/> <span>";
                // line 10
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_ViewVisitorProfile")), "html", null, true);
                // line 11
                if ( !twig_test_empty($this->getAttribute($context["visitor"], "getColumn", array(0 => "userId"), "method"))) {
                    echo ": ";
                    echo $this->getAttribute($context["visitor"], "getColumn", array(0 => "userId"), "method");
                }
                echo "</span>
                </a>
            ";
            }
            // line 14
            echo "
        ";
            // line 15
            $context["cycleIndex"] = (($context["cycleIndex"] ?? $this->getContext($context, "cycleIndex")) + 1);
            // line 16
            echo "            <div class=\"col s12 m";
            if (($context["displayVisitorsInOwnColumn"] ?? $this->getContext($context, "displayVisitorsInOwnColumn"))) {
                echo "3";
            } else {
                echo "4";
            }
            echo "\">
                ";
            // line 17
            echo call_user_func_array($this->env->getFunction('postEvent')->getCallable(), array("Live.renderVisitorDetails", $context["visitor"]));
            echo "
            </div>

            ";
            // line 20
            if (($context["displayVisitorsInOwnColumn"] ?? $this->getContext($context, "displayVisitorsInOwnColumn"))) {
                // line 21
                echo "                <div class=\"col s12 m2 own-visitor-column\">
                    ";
                // line 22
                echo call_user_func_array($this->env->getFunction('postEvent')->getCallable(), array("Live.renderVisitorIcons", $context["visitor"]));
                echo "
                </div>
            ";
            }
            // line 25
            echo "
            <div class=\"col s12 m";
            // line 26
            if (($context["displayVisitorsInOwnColumn"] ?? $this->getContext($context, "displayVisitorsInOwnColumn"))) {
                echo "7";
            } else {
                echo "8";
            }
            echo " column ";
            if (($this->getAttribute($context["visitor"], "getColumn", array(0 => "visitConverted"), "method") &&  !($context["isWidget"] ?? $this->getContext($context, "isWidget")))) {
                echo "highlightField";
            }
            echo "\">
                ";
            // line 27
            echo call_user_func_array($this->env->getFunction('postEvent')->getCallable(), array("Live.visitorLogViewBeforeActionsInfo", $context["visitor"]));
            echo "

                <strong>
                    ";
            // line 30
            $context["actionCount"] = twig_length_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "actionDetails"), "method"));
            // line 31
            echo "                    ";
            if ($this->getAttribute($context["visitor"], "truncatedActionsCount", array(), "any", true, true)) {
                // line 32
                echo "                        ";
                $context["actionCount"] = (($context["actionCount"] ?? $this->getContext($context, "actionCount")) + $this->getAttribute($context["visitor"], "truncatedActionsCount", array()));
                // line 33
                echo "                    ";
            }
            // line 34
            echo "                    ";
            echo \Piwik\piwik_escape_filter($this->env, ($context["actionCount"] ?? $this->getContext($context, "actionCount")), "html", null, true);
            echo "
                    ";
            // line 35
            if ((($context["actionCount"] ?? $this->getContext($context, "actionCount")) <= 1)) {
                // line 36
                echo "                        ";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Action")), "html", null, true);
                echo "
                    ";
            } else {
                // line 38
                echo "                        ";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Actions")), "html", null, true);
                echo "
                    ";
            }
            // line 40
            echo "                    ";
            if (($this->getAttribute($context["visitor"], "getColumn", array(0 => "visitDuration"), "method") > 0)) {
                echo "- ";
                echo $this->getAttribute($context["visitor"], "getColumn", array(0 => "visitDurationPretty"), "method");
            }
            // line 41
            echo "                </strong>

                <div class=\"visitor-log-page-list\">
                    <ol class='visitorLog'>
                        ";
            // line 45
            $this->loadTemplate("@Live/_actionsList.twig", "@Live/_dataTableViz_visitorLog.twig", 45)->display(array_merge($context, array("actionDetails" => $this->getAttribute($context["visitor"], "getColumn", array(0 => "actionDetails"), "method"), "visitInfo" => $context["visitor"])));
            // line 46
            echo "                    </ol>
                </div>
                ";
            // line 48
            echo call_user_func_array($this->env->getFunction('postEvent')->getCallable(), array("Live.visitorLogViewAfterActionsInfo", $context["visitor"]));
            echo "
            </div>
        </div>
    ";
            $context["visitorRow"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 52
            echo "
    ";
            // line 53
            echo \Piwik\piwik_escape_filter($this->env, ($context["visitorRow"] ?? $this->getContext($context, "visitorRow")), "html", null, true);
            echo "
";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['visitor'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "@Live/_dataTableViz_visitorLog.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  180 => 53,  177 => 52,  170 => 48,  166 => 46,  164 => 45,  158 => 41,  152 => 40,  146 => 38,  140 => 36,  138 => 35,  133 => 34,  130 => 33,  127 => 32,  124 => 31,  122 => 30,  116 => 27,  104 => 26,  101 => 25,  95 => 22,  92 => 21,  90 => 20,  84 => 17,  75 => 16,  73 => 15,  70 => 14,  61 => 11,  59 => 10,  52 => 9,  50 => 8,  46 => 6,  43 => 5,  26 => 4,  24 => 3,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% set displayVisitorsInOwnColumn = (isWidget ? false : true) %}

{% set cycleIndex=0 %}
{% for visitor in dataTable.getRows() %}
    {% set visitorRow %}
        <div class=\"card row hoverable\">

            {% if visitor.getColumn('visitorId') is not empty and not clientSideParameters.hideProfileLink %}
                <a class=\"visitor-log-visitor-profile-link visitorLogTooltip\" title=\"{{ 'Live_ViewVisitorProfile'|translate }}\" data-visitor-id=\"{{ visitor.getColumn(\"visitorId\") }}\">
                    <img src=\"plugins/Live/images/visitorProfileLaunch.png\"/> <span>{{ 'Live_ViewVisitorProfile'|translate }}
                        {%- if visitor.getColumn('userId') is not empty %}: {{ visitor.getColumn('userId')|raw }}{% endif %}</span>
                </a>
            {% endif %}

        {% set cycleIndex=cycleIndex+1 %}
            <div class=\"col s12 m{% if displayVisitorsInOwnColumn %}3{% else %}4{% endif %}\">
                {{ postEvent('Live.renderVisitorDetails', visitor) }}
            </div>

            {% if displayVisitorsInOwnColumn %}
                <div class=\"col s12 m2 own-visitor-column\">
                    {{ postEvent('Live.renderVisitorIcons', visitor) }}
                </div>
            {% endif %}

            <div class=\"col s12 m{% if displayVisitorsInOwnColumn %}7{% else %}8{% endif %} column {% if visitor.getColumn('visitConverted') and not isWidget %}highlightField{% endif %}\">
                {{ postEvent('Live.visitorLogViewBeforeActionsInfo', visitor) }}

                <strong>
                    {% set actionCount = visitor.getColumn('actionDetails')|length %}
                    {% if visitor.truncatedActionsCount is defined %}
                        {% set actionCount = actionCount + visitor.truncatedActionsCount %}
                    {% endif %}
                    {{ actionCount }}
                    {% if actionCount <= 1 %}
                        {{ 'General_Action'|translate }}
                    {% else %}
                        {{ 'General_Actions'|translate }}
                    {% endif %}
                    {% if visitor.getColumn('visitDuration') > 0 %}- {{ visitor.getColumn('visitDurationPretty')|raw }}{% endif %}
                </strong>

                <div class=\"visitor-log-page-list\">
                    <ol class='visitorLog'>
                        {% include \"@Live/_actionsList.twig\" with {'actionDetails': visitor.getColumn('actionDetails'), 'visitInfo': visitor} %}
                    </ol>
                </div>
                {{ postEvent('Live.visitorLogViewAfterActionsInfo', visitor) }}
            </div>
        </div>
    {% endset %}

    {{ visitorRow }}
{% endfor %}
", "@Live/_dataTableViz_visitorLog.twig", "/var/www/idiorm/idiorm-mvc-demo/analytics/piwik/plugins/Live/templates/_dataTableViz_visitorLog.twig");
    }
}
