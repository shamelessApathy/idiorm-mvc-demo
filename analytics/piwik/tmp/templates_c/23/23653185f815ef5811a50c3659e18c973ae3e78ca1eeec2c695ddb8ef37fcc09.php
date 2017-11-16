<?php

/* @Live/getVisitList.twig */
class __TwigTemplate_19df986ed0e09450143d5676b678c7c340508ac3004f0119b9ddf9c0df3986f0 extends Twig_Template
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
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["visits"] ?? $this->getContext($context, "visits")), "getRows", array(), "method"));
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
        foreach ($context['_seq'] as $context["_key"] => $context["visitInfo"]) {
            // line 2
            echo "<li data-number=\"";
            echo \Piwik\piwik_escape_filter($this->env, ($context["startCounter"] ?? $this->getContext($context, "startCounter")), "html", null, true);
            echo "\">
    <div>
        <div class=\"visitor-profile-visit-title\" data-idvisit=\"";
            // line 4
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitInfo"], "getColumn", array(0 => "idVisit"), "method"), "html", null, true);
            echo "\" title=\"";
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_ClickToViewMoreAboutVisit")), "html", null, true);
            echo "\">
            ";
            // line 5
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Visit")), "html", null, true);
            echo " #";
            echo \Piwik\piwik_escape_filter($this->env, ($context["startCounter"] ?? $this->getContext($context, "startCounter")), "html", null, true);
            echo "

            <span class=\"visitor-profile-date\" title=\"";
            // line 7
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitInfo"], "getColumn", array(0 => "serverDatePrettyFirstAction"), "method"), "html", null, true);
            echo " ";
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitInfo"], "getColumn", array(0 => "serverTimePrettyFirstAction"), "method"), "html", null, true);
            echo "\">
                ";
            // line 8
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitInfo"], "getColumn", array(0 => "serverDatePrettyFirstAction"), "method"), "html", null, true);
            echo " ";
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitInfo"], "getColumn", array(0 => "serverTimePrettyFirstAction"), "method"), "html", null, true);
            echo "
            </span>
        </div>
        <div class=\"visitor-profile-visit-details-extended\">
            ";
            // line 12
            echo call_user_func_array($this->env->getFunction('postEvent')->getCallable(), array("Live.renderVisitorDetails", $context["visitInfo"]));
            echo "
        </div>
        <div class=\"visitor-profile-visit-details\">
            ";
            // line 15
            echo call_user_func_array($this->env->getFunction('postEvent')->getCallable(), array("Live.renderVisitorIcons", $context["visitInfo"]));
            echo "
            <a href=\"#\" class=\"visitor-profile-show-actions\">
                ";
            // line 17
            $context["actionCount"] = twig_length_filter($this->env, $this->getAttribute($context["visitInfo"], "getColumn", array(0 => "actionDetails"), "method"));
            // line 18
            echo "                ";
            if ($this->getAttribute($context["visitInfo"], "truncatedActionsCount", array(), "any", true, true)) {
                // line 19
                echo "                    ";
                $context["actionCount"] = (($context["actionCount"] ?? $this->getContext($context, "actionCount")) + $this->getAttribute($context["visitInfo"], "truncatedActionsCount", array()));
                // line 20
                echo "                ";
            }
            // line 21
            echo "                ";
            if (($this->getAttribute($context["visitInfo"], "getColumn", array(0 => "visitDuration"), "method") != 0)) {
                // line 22
                echo "                    ";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_ActionsAndDuration", ($context["actionCount"] ?? $this->getContext($context, "actionCount")), $this->getAttribute($context["visitInfo"], "getColumn", array(0 => "visitDurationPretty"), "method"))), "html", null, true);
                echo "
                ";
            } else {
                // line 24
                echo "                    ";
                echo \Piwik\piwik_escape_filter($this->env, ($context["actionCount"] ?? $this->getContext($context, "actionCount")), "html", null, true);
                echo " ";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Actions")), "html", null, true);
                echo "
                ";
            }
            // line 26
            echo "            </a>
        </div>
        <ol class=\"visitorLog visitor-profile-actions\">
            ";
            // line 29
            $this->loadTemplate("@Live/_actionsList.twig", "@Live/getVisitList.twig", 29)->display(array_merge($context, array("actionDetails" => $this->getAttribute($context["visitInfo"], "getColumn", array(0 => "actionDetails"), "method"), "visitInfo" =>             // line 30
$context["visitInfo"])));
            // line 31
            echo "        </ol>
    </div>
</li>
";
            // line 34
            $context["startCounter"] = (($context["startCounter"] ?? $this->getContext($context, "startCounter")) - 1);
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['visitInfo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "@Live/getVisitList.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  122 => 34,  117 => 31,  115 => 30,  114 => 29,  109 => 26,  101 => 24,  95 => 22,  92 => 21,  89 => 20,  86 => 19,  83 => 18,  81 => 17,  76 => 15,  70 => 12,  61 => 8,  55 => 7,  48 => 5,  42 => 4,  36 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% for visitInfo in visits.getRows() %}
<li data-number=\"{{ startCounter }}\">
    <div>
        <div class=\"visitor-profile-visit-title\" data-idvisit=\"{{ visitInfo.getColumn('idVisit') }}\" title=\"{{ 'Live_ClickToViewMoreAboutVisit'|translate }}\">
            {{ 'General_Visit'|translate }} #{{ startCounter }}

            <span class=\"visitor-profile-date\" title=\"{{ visitInfo.getColumn('serverDatePrettyFirstAction') }} {{ visitInfo.getColumn('serverTimePrettyFirstAction') }}\">
                {{ visitInfo.getColumn('serverDatePrettyFirstAction') }} {{ visitInfo.getColumn('serverTimePrettyFirstAction') }}
            </span>
        </div>
        <div class=\"visitor-profile-visit-details-extended\">
            {{ postEvent('Live.renderVisitorDetails', visitInfo) }}
        </div>
        <div class=\"visitor-profile-visit-details\">
            {{ postEvent('Live.renderVisitorIcons', visitInfo) }}
            <a href=\"#\" class=\"visitor-profile-show-actions\">
                {% set actionCount = visitInfo.getColumn('actionDetails')|length %}
                {% if visitInfo.truncatedActionsCount is defined %}
                    {% set actionCount = actionCount + visitInfo.truncatedActionsCount %}
                {% endif %}
                {% if visitInfo.getColumn('visitDuration') != 0 %}
                    {{ 'Live_ActionsAndDuration'|translate(actionCount, visitInfo.getColumn('visitDurationPretty')) }}
                {% else %}
                    {{ actionCount }} {{ 'General_Actions'|translate }}
                {% endif %}
            </a>
        </div>
        <ol class=\"visitorLog visitor-profile-actions\">
            {% include \"@Live/_actionsList.twig\" with {'actionDetails': visitInfo.getColumn('actionDetails'),
                                                       'visitInfo': visitInfo} %}
        </ol>
    </div>
</li>
{% set startCounter = startCounter - 1 %}
{% endfor %}", "@Live/getVisitList.twig", "/var/www/idiorm/idiorm-mvc-demo/analytics/piwik/plugins/Live/templates/getVisitList.twig");
    }
}
