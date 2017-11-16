<?php

/* @UserCountry/_profileSummary.twig */
class __TwigTemplate_9d9fa6711207649f0fa5fa153ce848fd34fea3d7878d8684eeb05382ff249928 extends Twig_Template
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
        echo "<div class=\"visitor-profile-summary visitor-profile-location\">
    <h1>";
        // line 2
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_Location")), "html", null, true);
        echo "</h1>
    <p>";
        // line 4
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "countries", array()));
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
        foreach ($context['_seq'] as $context["_key"] => $context["entry"]) {
            // line 6
            ob_start();
            // line 7
            if ((($this->getAttribute($context["entry"], "cities", array(), "any", true, true) && (1 == twig_length_filter($this->env, $this->getAttribute($context["entry"], "cities", array())))) && twig_join_filter($this->getAttribute($context["entry"], "cities", array())))) {
                // line 8
                echo \Piwik\piwik_escape_filter($this->env, twig_join_filter($this->getAttribute($context["entry"], "cities", array())), "html", null, true);
            } elseif (($this->getAttribute(            // line 9
$context["entry"], "cities", array(), "any", true, true) && (1 < twig_length_filter($this->env, $this->getAttribute($context["entry"], "cities", array()))))) {
                // line 10
                echo "<span title=\"";
                echo \Piwik\piwik_escape_filter($this->env, twig_join_filter($this->getAttribute($context["entry"], "cities", array()), ", "), "html", null, true);
                echo "\">";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_FromDifferentCities")), "html", null, true);
                echo "</span>";
            }
            $context["entryCity"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 13
            echo "
            ";
            // line 14
            ob_start();
            // line 15
            echo "<strong>
                    ";
            // line 16
            if (($this->getAttribute($context["entry"], "nb_visits", array()) == 1)) {
                // line 17
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_OneVisit")), "html", null, true);
            } else {
                // line 19
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_NVisits", $this->getAttribute($context["entry"], "nb_visits", array()))), "html", null, true);
            }
            // line 21
            echo "</strong>";
            $context["entryVisits"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 23
            echo "
            ";
            // line 24
            ob_start();
            // line 25
            if (($context["entryCity"] ?? $this->getContext($context, "entryCity"))) {
                // line 26
                echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_CityAndCountry", ($context["entryCity"] ?? $this->getContext($context, "entryCity")), $this->getAttribute($context["entry"], "prettyName", array())));
            } else {
                // line 28
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["entry"], "prettyName", array()), "html", null, true);
            }
            // line 31
            echo "&nbsp;<img height=\"16px\" src=\"";
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["entry"], "flag", array()), "html", null, true);
            echo "\" title=\"";
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["entry"], "prettyName", array()), "html", null, true);
            echo "\"/>";
            $context["entryCountry"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 34
            echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_XFromY", ($context["entryVisits"] ?? $this->getContext($context, "entryVisits")), ($context["entryCountry"] ?? $this->getContext($context, "entryCountry"))));
            if ( !$this->getAttribute($context["loop"], "last", array())) {
                echo ", ";
            }
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entry'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "        <a class=\"visitor-profile-show-map\" href=\"#\" ";
        if (twig_test_empty(((array_key_exists("userCountryMapUrl", $context)) ? (_twig_default_filter(($context["userCountryMapUrl"] ?? $this->getContext($context, "userCountryMapUrl")), "")) : ("")))) {
            echo "style=\"display:none\"";
        }
        echo ">(";
        echo twig_replace_filter(call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_ShowMap")), array(" " => "&nbsp;"));
        echo ")</a> <img class=\"loadingPiwik\" style=\"display:none;\" src=\"plugins/Morpheus/images/loading-blue.gif\"/>
    </p>
    <div class=\"visitor-profile-map\" style=\"display:none\" data-href=\"";
        // line 38
        echo \Piwik\piwik_escape_filter($this->env, ((array_key_exists("userCountryMapUrl", $context)) ? (_twig_default_filter(($context["userCountryMapUrl"] ?? $this->getContext($context, "userCountryMapUrl")), "")) : ("")), "html", null, true);
        echo "\">
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "@UserCountry/_profileSummary.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  125 => 38,  115 => 36,  98 => 34,  91 => 31,  88 => 28,  85 => 26,  83 => 25,  81 => 24,  78 => 23,  75 => 21,  72 => 19,  69 => 17,  67 => 16,  64 => 15,  62 => 14,  59 => 13,  51 => 10,  49 => 9,  47 => 8,  45 => 7,  43 => 6,  26 => 4,  22 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"visitor-profile-summary visitor-profile-location\">
    <h1>{{ 'UserCountry_Location'|translate }}</h1>
    <p>
        {%- for entry in visitorData.countries -%}

            {% set entryCity -%}
                {% if entry.cities is defined and 1 == entry.cities|length and entry.cities|join -%}
                    {{ entry.cities|join }}
                {%- elseif entry.cities is defined and 1 < entry.cities|length -%}
                    <span title=\"{{ entry.cities|join(', ') }}\">{{ 'UserCountry_FromDifferentCities'|translate }}</span>
                {%- endif %}
            {%- endset %}

            {% set entryVisits -%}
                <strong>
                    {% if entry.nb_visits == 1 -%}
                        {{ 'General_OneVisit'|translate }}
                    {%- else -%}
                        {{ 'General_NVisits'|translate(entry.nb_visits) }}
                    {%- endif -%}
                </strong>
            {%- endset %}

            {% set entryCountry -%}
                {%- if entryCity -%}
                    {{ 'UserCountry_CityAndCountry'|translate(entryCity, entry.prettyName)|raw }}
                {%- else -%}
                    {{ entry.prettyName }}
                {%- endif -%}

                &nbsp;<img height=\"16px\" src=\"{{ entry.flag }}\" title=\"{{ entry.prettyName }}\"/>
            {%- endset %}

            {{- 'General_XFromY'|translate(entryVisits, entryCountry)|raw -}}{% if not loop.last %}, {% endif %}
        {%- endfor %}
        <a class=\"visitor-profile-show-map\" href=\"#\" {% if userCountryMapUrl|default('') is empty %}style=\"display:none\"{% endif %}>({{ 'Live_ShowMap'|translate|replace({' ': '&nbsp;'})|raw }})</a> <img class=\"loadingPiwik\" style=\"display:none;\" src=\"plugins/Morpheus/images/loading-blue.gif\"/>
    </p>
    <div class=\"visitor-profile-map\" style=\"display:none\" data-href=\"{{ userCountryMapUrl|default('') }}\">
    </div>
</div>", "@UserCountry/_profileSummary.twig", "/var/www/idiorm/idiorm-mvc-demo/analytics/piwik/plugins/UserCountry/templates/_profileSummary.twig");
    }
}
