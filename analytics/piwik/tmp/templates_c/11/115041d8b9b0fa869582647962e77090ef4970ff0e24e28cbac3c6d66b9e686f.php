<?php

/* @Live/_totalVisitors.twig */
class __TwigTemplate_a63f43d9878a500740afa0235a632fbbe4948f38d9c268704261329a08086d6e extends Twig_Template
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
        echo "<div id=\"visitsTotal\">
    <table class=\"dataTable\" cellspacing=\"0\">
        <thead>
        <tr>
            <th id=\"label\" class=\"sortable label first\" style=\"cursor: auto;\">
                <div id=\"thDIV\">";
        // line 6
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Date")), "html", null, true);
        echo "</div>
            </th>
            <th id=\"label\" class=\"sortable label\" style=\"cursor: auto;\">
                <div id=\"thDIV\">";
        // line 9
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnNbVisits")), "html", null, true);
        echo "</div>
            </th>
            <th id=\"label\" class=\"sortable label\" style=\"cursor: auto;\">
                <div id=\"thDIV\">";
        // line 12
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Actions")), "html", null, true);
        echo "</div>
            </th>
        </tr>
        </thead>
        <tbody>
        <tr class=\"\">
            <td class=\"label column\">";
        // line 18
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_LastHours", 24)), "html", null, true);
        echo "</td>
            <td class=\"column\">";
        // line 19
        echo \Piwik\piwik_escape_filter($this->env, ($context["visitorsCountToday"] ?? $this->getContext($context, "visitorsCountToday")), "html", null, true);
        echo "</td>
            <td class=\"column\">";
        // line 20
        echo \Piwik\piwik_escape_filter($this->env, ($context["pisToday"] ?? $this->getContext($context, "pisToday")), "html", null, true);
        echo "</td>
        </tr>
        <tr class=\"\">
            <td class=\"label column\">";
        // line 23
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_LastMinutes", 30)), "html", null, true);
        echo "</td>
            <td class=\"column\">";
        // line 24
        echo \Piwik\piwik_escape_filter($this->env, ($context["visitorsCountHalfHour"] ?? $this->getContext($context, "visitorsCountHalfHour")), "html", null, true);
        echo "</td>
            <td class=\"column\">";
        // line 25
        echo \Piwik\piwik_escape_filter($this->env, ($context["pisHalfhour"] ?? $this->getContext($context, "pisHalfhour")), "html", null, true);
        echo "</td>
        </tr>
        </tbody>
    </table>
</div>
";
    }

    public function getTemplateName()
    {
        return "@Live/_totalVisitors.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 25,  65 => 24,  61 => 23,  55 => 20,  51 => 19,  47 => 18,  38 => 12,  32 => 9,  26 => 6,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div id=\"visitsTotal\">
    <table class=\"dataTable\" cellspacing=\"0\">
        <thead>
        <tr>
            <th id=\"label\" class=\"sortable label first\" style=\"cursor: auto;\">
                <div id=\"thDIV\">{{ 'General_Date'|translate }}</div>
            </th>
            <th id=\"label\" class=\"sortable label\" style=\"cursor: auto;\">
                <div id=\"thDIV\">{{ 'General_ColumnNbVisits'|translate }}</div>
            </th>
            <th id=\"label\" class=\"sortable label\" style=\"cursor: auto;\">
                <div id=\"thDIV\">{{ 'General_Actions'|translate }}</div>
            </th>
        </tr>
        </thead>
        <tbody>
        <tr class=\"\">
            <td class=\"label column\">{{ 'Live_LastHours'|translate(24) }}</td>
            <td class=\"column\">{{ visitorsCountToday }}</td>
            <td class=\"column\">{{ pisToday }}</td>
        </tr>
        <tr class=\"\">
            <td class=\"label column\">{{ 'Live_LastMinutes'|translate(30) }}</td>
            <td class=\"column\">{{ visitorsCountHalfHour }}</td>
            <td class=\"column\">{{ pisHalfhour }}</td>
        </tr>
        </tbody>
    </table>
</div>
", "@Live/_totalVisitors.twig", "/var/www/idiorm/idiorm-mvc-demo/analytics/piwik/plugins/Live/templates/_totalVisitors.twig");
    }
}
