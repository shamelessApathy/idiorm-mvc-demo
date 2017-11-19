<?php

/* @DevicesDetection/_profileSummary.twig */
class __TwigTemplate_08f92283f891a38e77225a45bafa26e61a81a56586f82401be63b8366ac066d5 extends Twig_Template
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
        if ($this->getAttribute(($context["visitorData"] ?? null), "devices", array(), "any", true, true)) {
            // line 2
            echo "    <div class=\"visitor-profile-summary visitor-profile-devices\">
        <h1>";
            // line 3
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("DevicesDetection_Devices")), "html", null, true);
            echo "</h1>
        <div>";
            // line 5
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "devices", array()));
            foreach ($context['_seq'] as $context["type"] => $context["entry"]) {
                // line 6
                echo "<p>
                    <img height=\"16\" src=\"";
                // line 7
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["entry"], "icon", array()), "html", null, true);
                echo "\" />
                    ";
                // line 8
                if (((twig_length_filter($this->env, $this->getAttribute($context["entry"], "devices", array())) == 1) && twig_in_filter(call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Unknown")), $this->getAttribute($this->getAttribute($this->getAttribute($context["entry"], "devices", array()), 0, array(), "array"), "name", array())))) {
                    // line 9
                    echo "                        <span>";
                    echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("DevicesDetection_XVisitsFromDevices", (("<strong>" . $this->getAttribute($context["entry"], "count", array())) . "</strong>"), (("<strong>" . $context["type"]) . "</strong>")));
                    echo "
                    ";
                } else {
                    // line 11
                    echo "                    <span>";
                    echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("DevicesDetection_XVisitsFromDevices", (("<strong>" . $this->getAttribute($context["entry"], "count", array())) . "</strong>"), (("<strong>" . $context["type"]) . "</strong>")));
                    echo ":
                        ";
                    // line 12
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["entry"], "devices", array()));
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
                    foreach ($context['_seq'] as $context["_key"] => $context["device"]) {
                        // line 13
                        echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["device"], "name", array()), "html", null, true);
                        echo " (";
                        echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["device"], "count", array()), "html", null, true);
                        echo "x)";
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
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['device'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 15
                    echo "</span>
                    ";
                }
                // line 17
                echo "                </p>";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['type'], $context['entry'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 19
            echo "</div>
    </div>
";
        }
    }

    public function getTemplateName()
    {
        return "@DevicesDetection/_profileSummary.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  99 => 19,  93 => 17,  89 => 15,  69 => 13,  52 => 12,  47 => 11,  41 => 9,  39 => 8,  35 => 7,  32 => 6,  28 => 5,  24 => 3,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% if visitorData.devices is defined %}
    <div class=\"visitor-profile-summary visitor-profile-devices\">
        <h1>{{ 'DevicesDetection_Devices'|translate }}</h1>
        <div>
            {%- for type,entry in visitorData.devices -%}
                <p>
                    <img height=\"16\" src=\"{{ entry.icon }}\" />
                    {% if entry.devices|length == 1 and 'General_Unknown'|translate in entry.devices[0].name %}
                        <span>{{ 'DevicesDetection_XVisitsFromDevices'|translate('<strong>' ~ entry.count ~ '</strong>', '<strong>' ~ type ~ '</strong>')|raw }}
                    {% else %}
                    <span>{{ 'DevicesDetection_XVisitsFromDevices'|translate('<strong>' ~ entry.count ~ '</strong>', '<strong>' ~ type ~ '</strong>')|raw }}:
                        {% for device in entry.devices -%}
                            {{ device.name }} ({{ device.count }}x){% if not loop.last %}, {% endif %}
                        {%- endfor -%}
                    </span>
                    {% endif %}
                </p>
            {%- endfor -%}
        </div>
    </div>
{% endif %}", "@DevicesDetection/_profileSummary.twig", "/var/www/idiorm/idiorm-mvc-demo/analytics/piwik/plugins/DevicesDetection/templates/_profileSummary.twig");
    }
}
