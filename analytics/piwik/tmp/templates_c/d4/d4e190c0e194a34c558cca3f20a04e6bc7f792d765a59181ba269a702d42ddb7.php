<?php

/* @CoreVisualizations/macros.twig */
class __TwigTemplate_389a1b32d55f5d40a013969884a5d3c79e29506ec2544dbdc44426b5dad1787e extends Twig_Template
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
    }

    // line 1
    public function getsingleSparkline($__sparkline__ = null, $__allMetricsDocumentation__ = null, $__areSparklinesLinkable__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "sparkline" => $__sparkline__,
            "allMetricsDocumentation" => $__allMetricsDocumentation__,
            "areSparklinesLinkable" => $__areSparklinesLinkable__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2
            echo "
    <div class=\"sparkline ";
            // line 3
            if ((array_key_exists("areSparklinesLinkable", $context) &&  !($context["areSparklinesLinkable"] ?? $this->getContext($context, "areSparklinesLinkable")))) {
                echo "notLinkable";
            }
            echo "\">
        ";
            // line 4
            if ($this->getAttribute(($context["sparkline"] ?? $this->getContext($context, "sparkline")), "url", array())) {
                echo call_user_func_array($this->env->getFunction('sparkline')->getCallable(), array($this->getAttribute(($context["sparkline"] ?? $this->getContext($context, "sparkline")), "url", array())));
            }
            // line 5
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["sparkline"] ?? $this->getContext($context, "sparkline")), "metrics", array()));
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
            foreach ($context['_seq'] as $context["_key"] => $context["metric"]) {
                // line 6
                echo "            <span ";
                if (($this->getAttribute(($context["allMetricsDocumentation"] ?? null), $this->getAttribute($context["metric"], "column", array()), array(), "array", true, true) && $this->getAttribute(($context["allMetricsDocumentation"] ?? $this->getContext($context, "allMetricsDocumentation")), $this->getAttribute($context["metric"], "column", array()), array(), "array"))) {
                    echo "title=\"";
                    echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["allMetricsDocumentation"] ?? $this->getContext($context, "allMetricsDocumentation")), $this->getAttribute($context["metric"], "column", array()), array(), "array"), "html", null, true);
                    echo "\"";
                }
                echo ">
            ";
                // line 7
                if (twig_in_filter("%s", $this->getAttribute($context["metric"], "description", array()))) {
                    // line 8
                    echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array($this->getAttribute($context["metric"], "description", array()), (("<strong>" . $this->getAttribute($context["metric"], "value", array())) . "</strong>")));
                } else {
                    // line 10
                    echo "                <strong>";
                    echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["metric"], "value", array()), "html", null, true);
                    echo "</strong> ";
                    echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["metric"], "description", array()), "html", null, true);
                }
                // line 11
                if ( !$this->getAttribute($context["loop"], "last", array())) {
                    echo ", ";
                }
                // line 12
                echo "            </span>
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['metric'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 14
            echo "        ";
            if ($this->getAttribute(($context["sparkline"] ?? null), "evolution", array(), "any", true, true)) {
                // line 15
                echo "
            ";
                // line 16
                $context["evolutionPretty"] = $this->getAttribute($this->getAttribute(($context["sparkline"] ?? $this->getContext($context, "sparkline")), "evolution", array()), "percent", array());
                // line 17
                echo "
            ";
                // line 18
                if (($this->getAttribute($this->getAttribute(($context["sparkline"] ?? $this->getContext($context, "sparkline")), "evolution", array()), "percent", array()) < 0)) {
                    // line 19
                    echo "                ";
                    $context["evolutionClass"] = "negative-evolution";
                    // line 20
                    echo "                ";
                    $context["evolutionIcon"] = "arrow_down.png";
                    // line 21
                    echo "            ";
                } elseif (($this->getAttribute($this->getAttribute(($context["sparkline"] ?? $this->getContext($context, "sparkline")), "evolution", array()), "percent", array()) == 0)) {
                    // line 22
                    echo "                ";
                    $context["evolutionClass"] = "neutral-evolution";
                    // line 23
                    echo "                ";
                    $context["evolutionIcon"] = "stop.png";
                    // line 24
                    echo "            ";
                } else {
                    // line 25
                    echo "                ";
                    $context["evolutionClass"] = "positive-evolution";
                    // line 26
                    echo "                ";
                    $context["evolutionIcon"] = "arrow_up.png";
                    // line 27
                    echo "                ";
                    $context["evolutionPretty"] = ("+" . $this->getAttribute($this->getAttribute(($context["sparkline"] ?? $this->getContext($context, "sparkline")), "evolution", array()), "percent", array()));
                    // line 28
                    echo "            ";
                }
                // line 29
                echo "
            <span class=\"metricEvolution\" title=\"";
                // line 30
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["sparkline"] ?? $this->getContext($context, "sparkline")), "evolution", array()), "tooltip", array()), "html", null, true);
                echo "\"><img
                        style=\"padding-right:4px\" src=\"plugins/MultiSites/images/";
                // line 31
                echo \Piwik\piwik_escape_filter($this->env, ($context["evolutionIcon"] ?? $this->getContext($context, "evolutionIcon")), "html", null, true);
                echo "\"/>
                <strong class=\"";
                // line 32
                echo \Piwik\piwik_escape_filter($this->env, ($context["evolutionClass"] ?? $this->getContext($context, "evolutionClass")), "html", null, true);
                echo "\">";
                echo \Piwik\piwik_escape_filter($this->env, ($context["evolutionPretty"] ?? $this->getContext($context, "evolutionPretty")), "html", null, true);
                echo "</strong></span>
        ";
            }
            // line 34
            echo "    </div>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "@CoreVisualizations/macros.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  166 => 34,  159 => 32,  155 => 31,  151 => 30,  148 => 29,  145 => 28,  142 => 27,  139 => 26,  136 => 25,  133 => 24,  130 => 23,  127 => 22,  124 => 21,  121 => 20,  118 => 19,  116 => 18,  113 => 17,  111 => 16,  108 => 15,  105 => 14,  90 => 12,  86 => 11,  80 => 10,  77 => 8,  75 => 7,  66 => 6,  48 => 5,  44 => 4,  38 => 3,  35 => 2,  21 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% macro singleSparkline(sparkline, allMetricsDocumentation, areSparklinesLinkable) %}

    <div class=\"sparkline {% if areSparklinesLinkable is defined and not areSparklinesLinkable %}notLinkable{% endif %}\">
        {% if sparkline.url %}{{ sparkline(sparkline.url)|raw }}{% endif %}
        {% for metric in sparkline.metrics %}
            <span {% if allMetricsDocumentation[metric.column] is defined and allMetricsDocumentation[metric.column] %}title=\"{{ allMetricsDocumentation[metric.column] }}\"{% endif %}>
            {% if '%s' in metric.description -%}
                {{ metric.description|translate(\"<strong>\"~metric.value~\"</strong>\")|raw }}
            {%- else %}
                <strong>{{ metric.value }}</strong> {{ metric.description }}
            {%- endif %}{% if not loop.last %}, {% endif %}
            </span>
        {% endfor %}
        {% if sparkline.evolution is defined %}

            {% set evolutionPretty = sparkline.evolution.percent %}

            {% if sparkline.evolution.percent < 0 %}
                {% set evolutionClass = 'negative-evolution' %}
                {% set evolutionIcon  = 'arrow_down.png' %}
            {% elseif sparkline.evolution.percent == 0 %}
                {% set evolutionClass = 'neutral-evolution' %}
                {% set evolutionIcon  = 'stop.png' %}
            {% else %}
                {% set evolutionClass  = 'positive-evolution' %}
                {% set evolutionIcon   = 'arrow_up.png' %}
                {% set evolutionPretty = '+' ~ sparkline.evolution.percent %}
            {% endif %}

            <span class=\"metricEvolution\" title=\"{{ sparkline.evolution.tooltip }}\"><img
                        style=\"padding-right:4px\" src=\"plugins/MultiSites/images/{{ evolutionIcon }}\"/>
                <strong class=\"{{ evolutionClass }}\">{{ evolutionPretty }}</strong></span>
        {% endif %}
    </div>
{% endmacro %}
", "@CoreVisualizations/macros.twig", "/var/www/idiorm/idiorm-mvc-demo/analytics/piwik/plugins/CoreVisualizations/templates/macros.twig");
    }
}
