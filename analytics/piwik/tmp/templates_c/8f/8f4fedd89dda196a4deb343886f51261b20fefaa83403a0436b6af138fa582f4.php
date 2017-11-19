<?php

/* @Live/getVisitorProfilePopup.twig */
class __TwigTemplate_40e1da68178c62272f342f73fe2d8fa5e0489d001ca360f929d84fb98c635a26 extends Twig_Template
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
        if ( !($context["visitorData"] ?? $this->getContext($context, "visitorData"))) {
            // line 2
            echo "    <div class=\"pk-emptyDataTable\">";
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreHome_ThereIsNoDataForThisReport")), "html", null, true);
            echo "</div>
";
        } else {
            // line 4
            echo "    <div class=\"visitor-profile\"
         data-visitor-id=\"";
            // line 5
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "lastVisits", array()), "getFirstRow", array(), "method"), "getColumn", array(0 => "visitorId"), "method"), "html", null, true);
            echo "\"
         data-next-visitor=\"";
            // line 6
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "nextVisitorId", array()), "html", null, true);
            echo "\"
         data-prev-visitor=\"";
            // line 7
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "previousVisitorId", array()), "html", null, true);
            echo "\"
         tabindex=\"0\">
        <div class=\"visitor-profile-options\">
            <a href class=\"visitor-profile-close\" title=\"";
            // line 10
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Close")), "html", null, true);
            echo " \"></a>
            <a href=\"http://piwik.org/docs/user-profile/\" class=\"visitor-profile-help\" rel=\"noreferrer\"
               target=\"_blank\"
               title=\"";
            // line 13
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ViewDocumentationFor", ucwords(call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_VisitorProfile"))))), "html", null, true);
            echo "\">
            </a>
            <a href class=\"visitor-profile-toggle-actions\" title=\"";
            // line 15
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_ToggleActions")), "html", null, true);
            echo " \"></a>
        </div>
        <div class=\"visitor-profile-info\">
            <div class=\"visitor-profile-overview\">
                <div class=\"visitor-profile-header\">
                    <div class=\"visitor-profile-avatar\">
                        <img src=\"";
            // line 21
            echo \Piwik\piwik_escape_filter($this->env, (($this->getAttribute(($context["visitorData"] ?? null), "visitorAvatar", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["visitorData"] ?? null), "visitorAvatar", array()), "plugins/Live/images/unknown_avatar.png")) : ("plugins/Live/images/unknown_avatar.png")), "html", null, true);
            echo "\"
                             alt=\"";
            // line 22
            echo \Piwik\piwik_escape_filter($this->env, (($this->getAttribute(($context["visitorData"] ?? null), "visitorDescription", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["visitorData"] ?? null), "visitorDescription", array()), "")) : ("")), "html", null, true);
            echo "\"
                             title=\"";
            // line 23
            echo \Piwik\piwik_escape_filter($this->env, (($this->getAttribute(($context["visitorData"] ?? null), "visitorDescription", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["visitorData"] ?? null), "visitorDescription", array()), "")) : ("")), "html", null, true);
            echo "\"/>
                    </div>
                    <div class=\"visitor-profile-header-details\">
                        <div class=\"visitor-profile-headline\">
                            ";
            // line 27
            if ( !twig_test_empty($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "previousVisitorId", array()))) {
                echo "<a class=\"visitor-profile-prev-visitor\"
                                                                                  href=\"#\"
                                                                                  title=\"";
                // line 29
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_PreviousVisitor")), "html", null, true);
                echo "\">
                                    &larr;</a>";
            }
            // line 31
            echo "                            <h1>";
            // line 32
            if (twig_test_empty($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "userId", array()))) {
                // line 33
                echo "                                    ";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_VisitorProfile")), "html", null, true);
            } else {
                // line 35
                echo "                                    <span title=\"";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_UserId")), "html", null, true);
                echo ": ";
                echo $this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "userId", array());
                echo "\">";
                echo $this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "userId", array());
                echo "</span>
                                ";
            }
            // line 37
            echo "</h1>
                            ";
            // line 38
            if ( !twig_test_empty($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "nextVisitorId", array()))) {
                echo "<a class=\"visitor-profile-next-visitor\"
                                                                              href=\"#\"
                                                                              title=\"";
                // line 40
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_NextVisitor")), "html", null, true);
                echo "\">
                                    &rarr;</a>";
            }
            // line 42
            echo "                        </div>
                        <div class=\"visitor-profile-latest-visit\">
                            <div class=\"visitor-profile-id\">
                                <span>";
            // line 45
            echo \Piwik\piwik_escape_filter($this->env, twig_upper_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Id"))), "html", null, true);
            echo "</span>
                                ";
            // line 46
            if (array_key_exists("widgetizedLink", $context)) {
                echo "<a class=\"visitor-profile-widget-link\"
                                                                     href=\"";
                // line 47
                echo \Piwik\piwik_escape_filter($this->env, ($context["widgetizedLink"] ?? $this->getContext($context, "widgetizedLink")), "html", null, true);
                echo "\" target=\"_blank\"
                                                                     title=\"";
                // line 48
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Widgetize_OpenInNewWindow")), "html", null, true);
                echo " - ";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_VisitorProfile")), "html", null, true);
                echo " ";
                echo \Piwik\piwik_escape_filter($this->env, twig_upper_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Id"))), "html", null, true);
                echo " ";
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "visitorId", array()), "html", null, true);
                echo "\">";
            }
            // line 49
            echo "                                    <span>";
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "visitorId", array()), "html", null, true);
            echo "</span>";
            // line 50
            if (array_key_exists("widgetizedLink", $context)) {
                echo "</a>";
            }
            // line 51
            echo "                                <a class=\"visitor-profile-export\" href=\"";
            echo \Piwik\piwik_escape_filter($this->env, ($context["exportLink"] ?? $this->getContext($context, "exportLink")), "html", null, true);
            echo "\" target=\"_blank\"
                                   title=\"";
            // line 52
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ExportThisReport")), "html", null, true);
            echo "\">
                                    <span class=\"icon-export\"></span>
                                </a>
                            </div>
                            ";
            // line 56
            echo call_user_func_array($this->env->getFunction('postEvent')->getCallable(), array("Live.renderVisitorIcons", twig_first($this->env, $this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "lastVisits", array()))));
            echo "
                        </div>
                    </div>
                </div>

                ";
            // line 61
            echo ($context["profileSummary"] ?? $this->getContext($context, "profileSummary"));
            echo "

                ";
            // line 63
            echo call_user_func_array($this->env->getFunction('postEvent')->getCallable(), array("Template.afterVisitorProfileOverview"));
            echo "
            </div>
            <div class=\"visitor-profile-visits-info\">
                <div class=\"visitor-profile-visits-container\">
                    <ol class=\"visitor-profile-visits\">
                        ";
            // line 68
            $this->loadTemplate("@Live/getVisitList.twig", "@Live/getVisitorProfilePopup.twig", 68)->display(array_merge($context, array("visits" => $this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "lastVisits", array()), "startCounter" => $this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "totalVisits", array()))));
            // line 69
            echo "                    </ol>
                </div>
                <div class=\"visitor-profile-more-info\">
                    ";
            // line 72
            if (($this->getAttribute($this->getAttribute(($context["visitorData"] ?? $this->getContext($context, "visitorData")), "lastVisits", array()), "getRowsCount", array(), "method") >= twig_constant("Piwik\\Plugins\\Live\\VisitorProfile::VISITOR_PROFILE_MAX_VISITS_TO_SHOW"))) {
                // line 73
                echo "                        <a href=\"#\">";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_LoadMoreVisits")), "html", null, true);
                echo "</a> <img class=\"loadingPiwik\"
                                                                                   style=\"display:none;\"
                                                                                   src=\"plugins/Morpheus/images/loading-blue.gif\"/>
                    ";
            } else {
                // line 77
                echo "                        <span class=\"visitor-profile-no-visits\">";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_NoMoreVisits")), "html", null, true);
                echo "</span>
                    ";
            }
            // line 79
            echo "                </div>
            </div>
        </div>
    </div>
    <script type=\"text/javascript\">
        \$(function () {
            require('piwik/UI').VisitorProfileControl.initElements();
        });
    </script>
";
        }
    }

    public function getTemplateName()
    {
        return "@Live/getVisitorProfilePopup.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  211 => 79,  205 => 77,  197 => 73,  195 => 72,  190 => 69,  188 => 68,  180 => 63,  175 => 61,  167 => 56,  160 => 52,  155 => 51,  151 => 50,  147 => 49,  137 => 48,  133 => 47,  129 => 46,  125 => 45,  120 => 42,  115 => 40,  110 => 38,  107 => 37,  97 => 35,  93 => 33,  91 => 32,  89 => 31,  84 => 29,  79 => 27,  72 => 23,  68 => 22,  64 => 21,  55 => 15,  50 => 13,  44 => 10,  38 => 7,  34 => 6,  30 => 5,  27 => 4,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% if not visitorData %}
    <div class=\"pk-emptyDataTable\">{{ 'CoreHome_ThereIsNoDataForThisReport'|translate }}</div>
{% else %}
    <div class=\"visitor-profile\"
         data-visitor-id=\"{{ visitorData.lastVisits.getFirstRow().getColumn('visitorId') }}\"
         data-next-visitor=\"{{ visitorData.nextVisitorId }}\"
         data-prev-visitor=\"{{ visitorData.previousVisitorId }}\"
         tabindex=\"0\">
        <div class=\"visitor-profile-options\">
            <a href class=\"visitor-profile-close\" title=\"{{ 'General_Close'|translate }} \"></a>
            <a href=\"http://piwik.org/docs/user-profile/\" class=\"visitor-profile-help\" rel=\"noreferrer\"
               target=\"_blank\"
               title=\"{{ 'General_ViewDocumentationFor'|translate(\"Live_VisitorProfile\"|translate|ucwords) }}\">
            </a>
            <a href class=\"visitor-profile-toggle-actions\" title=\"{{ 'Live_ToggleActions'|translate }} \"></a>
        </div>
        <div class=\"visitor-profile-info\">
            <div class=\"visitor-profile-overview\">
                <div class=\"visitor-profile-header\">
                    <div class=\"visitor-profile-avatar\">
                        <img src=\"{{ visitorData.visitorAvatar|default(\"plugins/Live/images/unknown_avatar.png\") }}\"
                             alt=\"{{ visitorData.visitorDescription|default('') }}\"
                             title=\"{{ visitorData.visitorDescription|default('') }}\"/>
                    </div>
                    <div class=\"visitor-profile-header-details\">
                        <div class=\"visitor-profile-headline\">
                            {% if visitorData.previousVisitorId is not empty %}<a class=\"visitor-profile-prev-visitor\"
                                                                                  href=\"#\"
                                                                                  title=\"{{ 'Live_PreviousVisitor'|translate }}\">
                                    &larr;</a>{% endif %}
                            <h1>
                                {%- if visitorData.userId is empty %}
                                    {{ 'Live_VisitorProfile'|translate }}
                                {%- else %}
                                    <span title=\"{{ 'General_UserId'|translate }}: {{ visitorData.userId|raw }}\">{{ visitorData.userId|raw }}</span>
                                {% endif -%}
                            </h1>
                            {% if visitorData.nextVisitorId is not empty %}<a class=\"visitor-profile-next-visitor\"
                                                                              href=\"#\"
                                                                              title=\"{{ 'Live_NextVisitor'|translate }}\">
                                    &rarr;</a>{% endif %}
                        </div>
                        <div class=\"visitor-profile-latest-visit\">
                            <div class=\"visitor-profile-id\">
                                <span>{{ 'General_Id'|translate|upper }}</span>
                                {% if widgetizedLink is defined %}<a class=\"visitor-profile-widget-link\"
                                                                     href=\"{{ widgetizedLink }}\" target=\"_blank\"
                                                                     title=\"{{ 'Widgetize_OpenInNewWindow'|translate }} - {{ 'Live_VisitorProfile'|translate }} {{ 'General_Id'|translate|upper }} {{ visitorData.visitorId }}\">{% endif %}
                                    <span>{{ visitorData.visitorId }}</span>
                                    {%- if widgetizedLink is defined %}</a>{% endif %}
                                <a class=\"visitor-profile-export\" href=\"{{ exportLink }}\" target=\"_blank\"
                                   title=\"{{ 'General_ExportThisReport'|translate }}\">
                                    <span class=\"icon-export\"></span>
                                </a>
                            </div>
                            {{ postEvent('Live.renderVisitorIcons', visitorData.lastVisits|first) }}
                        </div>
                    </div>
                </div>

                {{ profileSummary|raw }}

                {{ postEvent('Template.afterVisitorProfileOverview') }}
            </div>
            <div class=\"visitor-profile-visits-info\">
                <div class=\"visitor-profile-visits-container\">
                    <ol class=\"visitor-profile-visits\">
                        {% include \"@Live/getVisitList.twig\" with {'visits': visitorData.lastVisits, 'startCounter': visitorData.totalVisits} %}
                    </ol>
                </div>
                <div class=\"visitor-profile-more-info\">
                    {% if visitorData.lastVisits.getRowsCount() >= constant(\"Piwik\\\\Plugins\\\\Live\\\\VisitorProfile::VISITOR_PROFILE_MAX_VISITS_TO_SHOW\") %}
                        <a href=\"#\">{{ 'Live_LoadMoreVisits'|translate }}</a> <img class=\"loadingPiwik\"
                                                                                   style=\"display:none;\"
                                                                                   src=\"plugins/Morpheus/images/loading-blue.gif\"/>
                    {% else %}
                        <span class=\"visitor-profile-no-visits\">{{ 'Live_NoMoreVisits'|translate }}</span>
                    {% endif %}
                </div>
            </div>
        </div>
    </div>
    <script type=\"text/javascript\">
        \$(function () {
            require('piwik/UI').VisitorProfileControl.initElements();
        });
    </script>
{% endif %}", "@Live/getVisitorProfilePopup.twig", "/var/www/idiorm/idiorm-mvc-demo/analytics/piwik/plugins/Live/templates/getVisitorProfilePopup.twig");
    }
}
