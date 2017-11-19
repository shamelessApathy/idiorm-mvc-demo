<?php

/* @CoreHome/_periodSelect.twig */
class __TwigTemplate_fe0c7edd27e9a77ba312a00a388ef39b584eed16ce6b1ea25b4f2387116719eb extends Twig_Template
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
        echo "<div id=\"periodString\" piwik-expand-on-click class=\"piwikTopControl piwikSelector borderedControl periodSelector\">
    <a id=\"date\" class=\"title\" title=\"";
        // line 2
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ChooseDate", ((array_key_exists("prettyDateLong", $context)) ? (_twig_default_filter(($context["prettyDateLong"] ?? $this->getContext($context, "prettyDateLong")), "")) : ("")))), "html_attr");
        echo "\" tabindex=\"4\">
        <span class=\"icon icon-calendar\"></span>
        ";
        // line 4
        echo \Piwik\piwik_escape_filter($this->env, ($context["prettyDate"] ?? $this->getContext($context, "prettyDate")), "html", null, true);
        echo "
    </a>
    <div id=\"periodMore\" class=\"dropdown\">
        <table>
            <tr>
                <td>
                    <div class=\"period-range\" style=\"display:none;\">
                        <div id=\"calendarRangeFrom\">
                            <h6>";
        // line 12
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_DateRangeFrom")), "html", null, true);
        echo "<input tabindex=\"4\" type=\"text\" id=\"inputCalendarFrom\" name=\"inputCalendarFrom\" class=\"browser-default\"/></h6>

                            <div id=\"calendarFrom\"></div>
                        </div>
                        <div id=\"calendarRangeTo\">
                            <h6>";
        // line 17
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_DateRangeTo")), "html", null, true);
        echo "<input tabindex=\"4\" type=\"text\" id=\"inputCalendarTo\" name=\"inputCalendarTo\" class=\"browser-default\"/></h6>

                            <div id=\"calendarTo\"></div>
                        </div>
                    </div>
                    <div class=\"period-date\">
                        <div id=\"datepicker\"></div>
                    </div>
                </td>
                <td>
                    <div class=\"period-type\">
                        <h6>";
        // line 28
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Period")), "html", null, true);
        echo "</h6>
                        <span id=\"otherPeriods\">
                            ";
        // line 30
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["periodsNames"] ?? $this->getContext($context, "periodsNames")));
        foreach ($context['_seq'] as $context["label"] => $context["thisPeriod"]) {
            // line 31
            echo "                                <p>
                                    <input type=\"radio\" name=\"period\"  tabindex=\"4\" id=\"period_id_";
            // line 32
            echo \Piwik\piwik_escape_filter($this->env, $context["label"], "html", null, true);
            echo "\" value=\"";
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFunction('linkTo')->getCallable(), array(array("period" => $context["label"]))), "html", null, true);
            echo "\"";
            if (($context["label"] == ($context["period"] ?? $this->getContext($context, "period")))) {
                echo " checked=\"checked\"";
            }
            echo " />
                                    <label for=\"period_id_";
            // line 33
            echo \Piwik\piwik_escape_filter($this->env, $context["label"], "html", null, true);
            echo "\">";
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["thisPeriod"], "singular", array()), "html", null, true);
            echo "</label>
                                </p>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['label'], $context['thisPeriod'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "                        </span>
                        <input tabindex=\"4\" type=\"submit\" value=\"";
        // line 37
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Apply")), "html", null, true);
        echo "\" id=\"calendarApply\" class=\"btn\"/>
                        ";
        // line 38
        $context["ajax"] = $this->loadTemplate("ajaxMacros.twig", "@CoreHome/_periodSelect.twig", 38);
        // line 39
        echo "                        ";
        echo $context["ajax"]->getloadingDiv("ajaxLoadingCalendar");
        echo "
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class=\"period-click-tooltip\" style=\"display:none;\">";
        // line 45
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ClickToChangePeriod")), "html", null, true);
        echo "</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@CoreHome/_periodSelect.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  112 => 45,  102 => 39,  100 => 38,  96 => 37,  93 => 36,  82 => 33,  72 => 32,  69 => 31,  65 => 30,  60 => 28,  46 => 17,  38 => 12,  27 => 4,  22 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div id=\"periodString\" piwik-expand-on-click class=\"piwikTopControl piwikSelector borderedControl periodSelector\">
    <a id=\"date\" class=\"title\" title=\"{{ 'General_ChooseDate'|translate(prettyDateLong|default(''))|e('html_attr') }}\" tabindex=\"4\">
        <span class=\"icon icon-calendar\"></span>
        {{ prettyDate }}
    </a>
    <div id=\"periodMore\" class=\"dropdown\">
        <table>
            <tr>
                <td>
                    <div class=\"period-range\" style=\"display:none;\">
                        <div id=\"calendarRangeFrom\">
                            <h6>{{ 'General_DateRangeFrom'|translate }}<input tabindex=\"4\" type=\"text\" id=\"inputCalendarFrom\" name=\"inputCalendarFrom\" class=\"browser-default\"/></h6>

                            <div id=\"calendarFrom\"></div>
                        </div>
                        <div id=\"calendarRangeTo\">
                            <h6>{{ 'General_DateRangeTo'|translate }}<input tabindex=\"4\" type=\"text\" id=\"inputCalendarTo\" name=\"inputCalendarTo\" class=\"browser-default\"/></h6>

                            <div id=\"calendarTo\"></div>
                        </div>
                    </div>
                    <div class=\"period-date\">
                        <div id=\"datepicker\"></div>
                    </div>
                </td>
                <td>
                    <div class=\"period-type\">
                        <h6>{{ 'General_Period'|translate }}</h6>
                        <span id=\"otherPeriods\">
                            {% for label,thisPeriod in periodsNames %}
                                <p>
                                    <input type=\"radio\" name=\"period\"  tabindex=\"4\" id=\"period_id_{{ label }}\" value=\"{{ linkTo( { 'period': label} ) }}\"{% if label==period %} checked=\"checked\"{% endif %} />
                                    <label for=\"period_id_{{ label }}\">{{ thisPeriod.singular }}</label>
                                </p>
                            {% endfor %}
                        </span>
                        <input tabindex=\"4\" type=\"submit\" value=\"{{ 'General_Apply'|translate }}\" id=\"calendarApply\" class=\"btn\"/>
                        {% import 'ajaxMacros.twig' as ajax %}
                        {{ ajax.loadingDiv('ajaxLoadingCalendar') }}
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class=\"period-click-tooltip\" style=\"display:none;\">{{ 'General_ClickToChangePeriod'|translate }}</div>
</div>
", "@CoreHome/_periodSelect.twig", "/var/www/idiorm/idiorm-mvc-demo/analytics/piwik/plugins/CoreHome/templates/_periodSelect.twig");
    }
}
